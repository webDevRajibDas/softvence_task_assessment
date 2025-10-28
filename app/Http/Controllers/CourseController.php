<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Course;
use App\Models\Module;
use App\Traits\UploadVideoTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class CourseController extends Controller
{
    use UploadVideoTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.course.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.course.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        //dd($request->all());
        // Validate the request
        $validator = Validator::make($request->all(), [
            'course_title' => 'required|string|max:255',
            'course_description' => 'required|string',
            'video_path' => 'nullable|file|mimes:mp4,mov,avi,mkv,webm|max:204800',
            'modules' => 'required|array|min:1',
            'modules.*.title' => 'required|string|max:255',
            'modules.*.contents' => 'array',
            'modules.*.contents.*.title' => 'required|string|max:255',
            'modules.*.contents.*.type' => 'required|string|in:video,article,quiz,assignment',
            'modules.*.contents.*.video_url' => 'nullable|url',
            'modules.*.contents.*.duration' => 'nullable|integer|min:1',
            'modules.*.contents.*.text' => 'nullable|string',
            'modules.*.contents.*.questions' => 'nullable|string',
            'modules.*.contents.*.instructions' => 'nullable|string',
            'modules.*.contents.*.due_date' => 'nullable|date',
        ],[
            'course_title.required' => 'Title name is required.',
            'course_description.required' => 'Description is required.',
            'video_path.required' => 'Please upload feature video',

        ]);

        $videoPath = $this->uploadVideo($request, 'video_path');

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            // Create course

            $data = $validator->validated();

            $course = new Course();
            $course->title = $data['course_title'];
            $course->description = $data['course_description'];
            $course->video_path = $videoPath;
            $course->status = 'under_review';
            $course->category_id = 1;
            $course->module_id = 1;
            $course->price = 1000;
            $course->created_by = auth()->user()->id;
            $course->save();

            // Create modules and contents
            foreach ($request->modules as $moduleData) {
                $module = Module::create([
                    'course_id' => $course->id,
                    'title' => $moduleData['title'],
                    'order' => $moduleData['order'] ?? 0
                ]);

                if (isset($moduleData['contents'])) {
                    foreach ($moduleData['contents'] as $contentData) {
                        Content::create([
                            'module_id' => $module->id,
                            'title' => $contentData['title'],
                            'type' => $contentData['type'],
                            'video_url' => $contentData['video_url'] ?? null,
                            'duration' => $contentData['duration'] ?? null,
                            'content_text' => $contentData['text'] ?? null,
                            'due_date' => $contentData['due_date'] ?? null,
                            'order' => $contentData['order'] ?? 0
                        ]);
                    }
                }
            }

            DB::commit();

            return redirect()->back()->with('success', 'Course created successfully!');
//            return response()->json([
//                'success' => true,
//                'message' => 'Course created successfully!',
//                'course_id' => $course->id,
//                'redirect_url' => route('courses.show', $course->id)
//            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Failed to create course: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
