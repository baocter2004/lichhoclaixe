<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Instructor;
use App\Models\Specialzation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::with('user')->latest('instructors.id')->paginate(5);
        return view('admin.instructors.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialzations = Specialzation::query()->get(['id', 'specialzation_name']);
        return view('admin.instructors.create', compact('specialzations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $storeUserRequest, StoreInstructorRequest $storeInstructorRequest)
    {
        DB::beginTransaction();
        try {
            $data = $storeUserRequest->except('user_image');

            if ($storeUserRequest->hasFile('user_image')) {
                $data['user_image'] = Storage::put('instructors', $storeUserRequest->file('user_image'));
            }

            $user = User::query()->create($data);

            if ($user) {
                $instructorData = $storeInstructorRequest->all();
                $instructorData['user_id'] = $user->id;
                $instructor = Instructor::query()->create($instructorData);

                $specialzationIds = $storeInstructorRequest->input('specialzations', []);
                $instructor->specialzations()->sync($specialzationIds);
            }

            DB::commit();

            return redirect()
                ->route('admin.instructors.index')
                ->with('success', 'Thêm Thành Công !!!');
        } catch (\Throwable $th) {

            DB::rollBack();
            // return redirect()->back()->withErrors($th->getMessage());
            return redirect()->back()->with('success', "Thêm Mới Không Thành Công");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $instructor = Instructor::findOrFail($id);
            return view('admin.instructors.show', compact('instructor'));
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'Không Tồn Tại User');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $instructor = Instructor::findOrFail($id);
            return view('admin.instructors.edit', compact('instructor'));
        } catch (\Throwable $th) {
            // return back()->withErrors($th->getMessage());
            return back()->with('error', 'Không Tồn Tại User');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $updateUserRequest, UpdateInstructorRequest $updateInstructorRequest, string $id)
    {
        try {
            $userData = $updateUserRequest->except('user_image');
            $userData['is_active'] = isset($userData['is_active']) ? $userData['is_active'] : 0;

            if ($updateUserRequest->hasFile('user_image')) {
                $userData['user_image'] = Storage::put('instructors', $updateUserRequest->file('user_image'));
            }

            $user = User::findOrFail($id);

            $oldImage = $user->user_image;

            // Cập nhật thông tin user
            $user->update($userData);

            if ($user->instructor) {
                $instructorData = $updateInstructorRequest->all();
                $user->instructor->update($instructorData);
                $instructor = $user->instructor;
            } else {
                // Nếu không có, có thể tạo mới thông tin instructor nếu cần
                $instructorData = $updateInstructorRequest->all();
                $instructorData['user_id'] = $user->id;
                $user->instructor()->create($instructorData);
            }

            $specialzationIds = $updateInstructorRequest->input('specialzations', []);
            $instructor->specialzations()->sync($specialzationIds);

            // Xóa ảnh cũ nếu có ảnh mới và ảnh cũ tồn tại
            if (
                $updateUserRequest->hasFile('user_image')
                && Storage::exists($oldImage)
                && !empty($oldImage)
            ) {
                Storage::delete($oldImage);
            }

            DB::commit();
            return view('admin.instructors.edit', compact('instructor'))->with('success', 'Cập nhật thành công!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors($th->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $instructor = Instructor::findOrFail($id);

            $instructor->user->update([
                'is_active' => 0
            ]);

            // Xóa user liên quan
            $instructor->user->delete();
            $instructor->delete();

            DB::commit();
            return redirect()->route('admin.instructors.index')->with('success', 'Xóa Thành Công');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Xóa Không Thành Công');
        }
    }
    public function trash()
    {
        try {
            $instructors = Instructor::with([
                'user' => function ($query) {
                    $query->withTrashed();
                }
            ])
                ->onlyTrashed()
                ->latest('instructors.id')
                ->paginate(5);
            return view('admin.instructors.trash', compact('instructors'));
        } catch (\Throwable $th) {
            //throw $th;
            return back()->withErrors($th->getMessage());
        }
    }

    public function forceDestroy(string $id)
    {
        DB::beginTransaction();
        try {
            $instructor = Instructor::with('user')->findOrFail($id);

            $instructor->user->forceDelete();
            $instructor->forceDelete();

            if (Storage::exists($instructor->user->user_image)) {
                Storage::delete($instructor->user->user_image);
            }
            DB::commit();
            return redirect()->route('admin.instructors.trash')->with('success', 'Xóa Thành Công !!!');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return back()->withErrors($th->getMessage());
        }
    }

    public function restore(string $id)
    {
        try {
            $instructor = Instructor::with([
                'user' => function ($query) {
                    $query->withTrashed();
                }
            ])
                ->onlyTrashed()
                ->findOrFail($id);

            $instructor->user->restore();

            $instructor->user->update([
                'is_active' => 1
            ]);

            $instructor->restore();
            return redirect()->route('admin.instructors.index')->with('sucess', 'Restore Thành Công !!!');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return back()->withErrors($th->getMessage());
        }
    }
}
