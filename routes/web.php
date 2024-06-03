<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ChatMessageController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\DrugUseTrackerController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\Admin\HealthProController;
use App\Http\Controllers\AlcoholUseTrackerController;
use App\Http\Controllers\DepressionTrackerController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\HealthProfessionalProfileController;
use App\Http\Controllers\NotificationController;
use App\Models\HealthProfessionalProfile;
use Illuminate\Pagination\Paginator;
use App\Models\Notification;
use Illuminate\View\View;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/pychologists', function () {
    $perPage = 6;
    $doctors = User::whereHas('roles', function ($query) {
        $query->where('name', 'health_professional');
    })->whereHas('healthProfessionalProfile')->paginate(6);

    return view('home.index', ['doctors' => $doctors]);
});

Route::get('/pychologists/all', function(){
    $doctors = User::whereHas('roles', function ($query) {
        $query->where('name', 'health_professional');
    })->whereHas('healthProfessionalProfile')->paginate(12);
    return view('home.index', ['doctors' => $doctors]);
});

Route::post('/search', function(Request $request){

        $keyword = $request->input('search');
        // return $keyword;
        $doctors = User::whereHas('roles', function ($query) {
            $query->where('name', 'health_professional');
        })
        ->where(function ($query) use ($keyword) {
            $query->where('email', 'like', "%$keyword%")
                ->orWhereHas('healthProfessionalProfile', function ($query) use ($keyword) {
                    $query->where('first_name', 'like', "%$keyword%")
                        ->orWhere('last_name', 'like', "%$keyword%")
                        ->orWhere('about', 'like', "%$keyword%")
                        ->orWhere('description', 'like', "%$keyword%")
                        ->orWhere('specialization', 'like', "%$keyword%")
                        ->orWhere('hospital_affiliation', 'like', "%$keyword%")
                        ->orWhere('phone_number', 'like', "%$keyword%")
                        ->orWhere('location', 'like', "%$keyword%")
                        ->orWhere('license', 'like', "%$keyword%")
                        ->orWhere('years_of_experience', 'like', "%$keyword%")
                        ->orWhereJsonContains('issues', $keyword);
                });
        })
        ->paginate(6);

       

    return view('home.index', ['doctors' => $doctors]);
        // $results = HealthProfessionalProfile::search($keyword);
       
        // return view('home.index', ['results' => $results]);
});

Route::post('/filter', function(Request $request){
    
    $request->validate([
        'city' => 'nullable|string|max:25', // Adjust max length as needed
    ]);
    $counseling = $request->input('counseling');
    $city = $request->input('city');
    $age = $request->input('age');
    $gender = $request->input('gender');

    $doctors = User::whereHas('roles', function ($query) {
            $query->where('name', 'health_professional');
        })
        ->whereHas('healthProfessionalProfile', function ($query) use ($city) {
            $query->where('location', 'like', "%$city%");
        });

    if ($counseling && $counseling != 'all') {
        $doctors->whereHas('healthProfessionalProfile', function ($query) use ($counseling) {
            $query->whereJsonContains('issues', $counseling);
        });
    }

    if ($age && $age != 'all') {
        $doctors->whereHas('healthProfessionalProfile', function ($query) use ($age) {
            $query->where('age', '>=', $age);
        });
    }

    if ($gender && $gender != 'All') {
        $doctors->where('gender', $gender);
    }

    // dd($doctors);
    $results = $doctors->paginate(3);
    return view('home.index', ['doctors' => $results]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('health_professional/{id}', [UserController::class, 'showPsychologist'])->name('health_professional');
    Route::get('/student/status', [StudentController::class, 'showSetStatus']);
    Route::get('/student/questions', [StudentController::class, 'showStatusQuestions']);
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.k');


Route::get('email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification Link Sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('auth')->group(
    function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');    
        Route::resource('/chats', ChatMessageController::class);
        Route::resource('/students', StudentProfileController::class);
        Route::resource('/depressions', DepressionTrackerController::class);
        Route::resource('/notifications', NotificationController::class);

        Route::post('/book', [NotificationController::class, 'store']);
        Route::put('/book', [NotificationController::class, 'update'])->name('accept.offer');
        Route::get('/student/{id}', [UserController::class, 'showStudent']);
        
        Route::patch(
            '/profile/picture',
            function (Request $request) {
                $request->validate([
                    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the uploaded file
                ]);

                if ($request->hasFile('avatar')) {
                    $avatarFileName = time() . '.' . $request->avatar->getClientOriginalExtension();
                    $request->avatar->storeAs('public/users-avatar', $avatarFileName); // Store the uploaded image in storage

                    // Update user's avatar column
                    $user = Auth::user();
                    $user->avatar = $avatarFileName;
                    $user->save();

                    return redirect()->back()->with('success', 'Avatar uploaded successfully.');
                }

                return redirect()->back()->with('error', 'Failed to upload avatar.');
            }
        )->name('profile.picture');
    }
);
// Route::put('/students/{student}', [StudentProfileController::class, 'update'])->name('students.update');

Route::middleware('auth')->group(
    function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Route::resource('/chats', ChatMessageController::class);


        Route::resource('/students', StudentProfileController::class);

        Route::resource('/professionals', HealthProfessionalProfileController::class);








        // Index Route

        // Create Routes
        // Route::get('/students/create', [StudentProfileController::class, 'create'])->name('students.create');
        // Route::post('/students', [StudentProfileController::class, 'store'])->name('students.store');

        // Read Routes
        // Route::get('/students/{student}', [StudentProfileController::class, 'show'])->name('students.show');


        // Route::patch('/students/{student}', [StudentProfileController::class, 'update']);

        // Update Routes
        // Route::get('/students/{student}/edit', [StudentProfileController::class, 'edit'])->name('students.edit');


        // Delete Route
        // Route::delete('/students/{student}', [StudentProfileController::class, 'destroy'])->name('students.destroy');
        Route::resource('/alcohols', AlcoholUseTrackerController::class);
        Route::resource('/depressions', DepressionTrackerController::class);

        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

        Route::resource('/drugs', DrugUseTrackerController::class);

        Route::patch(
            '/profile/picture',
            function (Request $request) {
                $request->validate([
                    'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the uploaded file
                ]);

                if ($request->hasFile('avatar')) {
                    $avatarFileName = time() . '.' . $request->avatar->getClientOriginalExtension();
                    $request->avatar->storeAs('public/users-avatar', $avatarFileName); // Store the uploaded image in storage

                    // Update user's avatar column
                    $user = Auth::user();
                    $user->avatar = $avatarFileName;
                    $user->save();

                    return redirect()->back()->with('success', 'Avatar uploaded successfully.');
                }

                return redirect()->back()->with('error', 'Failed to upload avatar.');
            }
        )->name('profile.picture');
    }
);

// Admin Controller
Route::post('admin/login', [AdminController::class, 'submit_login']);
Route::get('admin/login', [AdminController::class, 'login']);
Route::get('admin', [AdminController::class, 'index']);
Route::get('admin/logout', [AdminController::class, 'logout']);

//student
Route::get('stu/{id}/delete', [StudentController::class, 'destroy']);
Route::resource('stu', StudentController::class);

//health-pro
Route::get('health/{id}/delete', [HealthProController::class, 'destroy']);
Route::resource('health', HealthProController::class);

//blog
Route::get('blog/{id}/delete', [BlogController::class, 'destroy']);
Route::resource('blog', BlogController::class);



Route::controller(GoogleController::class)->group(function () {
    Route::post('googleFinishUp', [GoogleController::class, 'finishUp'])->name('googleFinishUp');
    Route::get('social/google', 'redirect')->name('auth.google');
    Route::get('social/google/callback', 'googleCallback');
});





Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('posts.show');

Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

require __DIR__ . '/auth.php';
