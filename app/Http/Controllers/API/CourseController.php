<?php

namespace App\Http\Controllers\API;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\DataObjects\ServiceDataObject;
use App\Http\Resources\CourseResource;
use App\Actions\Course\StoreCourseAction;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CourseResource::collection(Course::latest()->get());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request, StoreCourseAction $storeCourseAction)
    {

        // store image in storage
        $courseImageUrl = $request->file('image')->store('courses', 'public');

        $data = array_merge($request->except('image'), [
            'image' => $courseImageUrl
        ]);

        $courseDTO = new ServiceDataObject(...$data);
        $course = $storeCourseAction->execute($courseDTO);

        return response()->json([
            'data' => new CourseResource($course),
            'message' => 'La prestation a bien été créée',
            'status' => 'success'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return new CourseResource($course->load('category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course): RedirectResponse
    {
        //
    }

    public function popular()
    {
        return CourseResource::collection(Course::with('category')->popular()->take(6)->get());
    }

    public function userCourses(Request $request)
    {
       return CourseResource::collection($request->user()->services);
    }
}
