    <?php

    use App\Http\Controllers\ListingController;
    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Http\Request;
    use App\Models\Listing;

    /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    // Route::get('/', function () {
    //     return view('welcome');
    // });
    // All listing
    Route::get('/', function () {
        return view('listings', [
            'heading' => 'Latest listing',
            'listings' => Listing::all()
        ]);
    });

    // get by id
    Route::get('/listings/{listing}', function (listing $listing) {
        // dd(listing::find($id));
        return view('listing', [
            'listing' => $listing
        ]);
    });
    Route::get('/hello', function () {
        return 'Hello world';
    });

    Route::get('/post/{id}', function ($id) {
        // ddd($id);
        return response('Post' . $id);
    })->where('id', '[0-9]+');

    Route::get('/search', function (Request $request) {
        // dd($request);
        return response('Search' . $request);
        // return response('Search' . $request->name . ' ' . $request->city);
    });
    // All Listings
    Route::get('/', [ListingController::class, 'index']);

    // Show Create Form
    Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

    // Store Listing Data
    Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

    // Show Edit Form
    Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

    // Update Listing
    Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

    // Delete Listing
    Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

    // Manage Listings
    Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

    // Single Listing
    Route::get('/listings/{listing}', [ListingController::class, 'show']);

    // Show Register/Create Form
    Route::get('/register', [UserController::class, 'create'])->middleware('guest');

    // Create New User
    Route::post('/users', [UserController::class, 'store']);

    // Log User Out
    Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

    // Show Login Form
    Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

    // Log In User
    Route::post('/users/authenticate', [UserController::class, 'authenticate']);
