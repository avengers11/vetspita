<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\AdminAccountController;
use App\Http\Controllers\admin\AdminAppointmentController;
use App\Http\Controllers\admin\AdminCareerController;
use App\Http\Controllers\admin\AdminLabDiognosisController;
use App\Http\Controllers\admin\AdminConsultantController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminGalleryController;
use App\Http\Controllers\admin\AdminGeneralSettingController;
use App\Http\Controllers\admin\AdminInvoiceController;
use App\Http\Controllers\admin\AdminLabTestController;
use App\Http\Controllers\admin\AdminMedicineController;
use App\Http\Controllers\admin\AdminPetsController;
use App\Http\Controllers\admin\AdminPostController;
use App\Http\Controllers\admin\AdminPrescriptionController;
use App\Http\Controllers\admin\AdminProductsController;
use App\Http\Controllers\admin\AdminServiceController;
use App\Http\Controllers\admin\AdminTestController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\eConsultationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
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



// Route::get('/filtered-plans/{pkgName}', function () {
//     return view('frontend.filtered_plans');
// })->name('filteredplans');

// Route::get('/filtered-plans/{pkgName}/{planName}', function () {
//     return view('frontend.filtered_plans');
// })->name('filteredplans');

Route::get('/checkout', function () {
    return view('frontend.checkout');
})->name('checkout');

Route::get('/prescriptions', function () {
    return view('frontend.prescriptions');
})->name('prescriptions');

Route::get('/privacy-policy', function () {
    return view('frontend.privacy_policy');
})->name('privacy_policy');

Route::get('/terms-and-conditions', function () {
    return view('frontend.terms_and_conditions');
})->name('terms_and_conditions');

Route::get('/support', function () {
    return view('frontend.support');
})->name('support');

// Home Route
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'home')->name('home');
});

// our-team
Route::controller(ConsultantController::class)->group(function(){
    Route::get('/our-team', 'team')->name('team');
    Route::get('/our-team/profile/{member}', 'teamProfile')->name('teamProfile');
});

// Services 
Route::controller(ServiceController::class)->group(function(){
    Route::get('/services', 'service')->name('services');
    Route::get('/services/{service}', 'serviceDetails')->name('serviceDetails');
});

// Gallery 
Route::controller(GalleryController::class)->name('gallery.')->prefix('gallery')->group(function(){
    Route::get('/image', 'image')->name('image');
    Route::get('/video', 'video')->name('video');
});

// Product 
Route::controller(ProductController::class)
    ->name('product.')
    ->prefix('product')
    ->group(function () {
        Route::get('/details/{product}', 'details')->name('details');
        Route::get('/filter', 'filtered')->name('filter');
    });

// Blog 
Route::controller(BlogController::class)->name('blog.')->prefix('blog')->group(function(){
    Route::get('/', 'blogs')->name('blogs');
    Route::get('/{blog}', 'details')->name('details');
});

// Blog 
Route::controller(CareerController::class)->name('career.')->prefix('career')->group(function(){
    Route::get('/', 'career')->name('index');
});

// consultation 
Route::controller(eConsultationController::class)->name('e-consultation.')->prefix('e-consultation')->group(function(){
    Route::get('/', 'eConsultation')->name('index');
});
// Route::get('/wishlist', function () {
//     return view('frontend.wishlist');
// })->name('wishlist');

// Route::get('/cart', function () {
//     return view('frontend.cart');
// })->name('cart');


// Auth 
Route::controller(AccountController::class)->prefix('user')->name('user.')->group(function(){
    Route::any('/login', 'login')->name('login');
    Route::any('/register', 'register')->name('register');
});
Route::group(['middleware' => ['auth']], function () {
    Route::any('/logout', [AccountController::class, 'logout'])->name('logout');

    // appointment
    Route::controller(AppointmentController::class)->prefix('appointment')->name('appointment.')->group(function(){
        Route::any('/', 'appointment')->name('index');
        Route::get('/history', 'history')->name('history');
    });

    // prescriptions
    Route::controller(AppointmentController::class)->prefix('prescriptions')->name('prescriptions.')->group(function(){
        Route::get('/', 'prescriptions')->name('index');
        Route::get('/view/{prescription}', 'prescriptionView')->name('view');
    });

    // tests
    Route::controller(AppointmentController::class)->prefix('tests')->name('tests.')->group(function(){
        Route::get('/', 'tests')->name('index');
        Route::get('/view/{test}', 'testView')->name('view');
    });

    // appointment
    Route::controller(ProfileController::class)->group(function(){
        Route::any('/profile', 'profile')->name('profile');

        // pet  
        Route::get('/pet', 'pet')->name('pet');
        Route::any('/pet/add', 'petAdd')->name('petAdd');
        Route::any('/pet/details/{pet}', 'petDetails')->name('petDetails');
    });

    // order 
    Route::controller(ProductController::class)
    ->name('order.')
    ->prefix('order')
    ->group(function () {
        Route::get('/', 'order')->name('index');
        Route::any('/checkout/{product}', 'checkout')->name('checkout');
    });
});


/* AdminAccountController
================================
        Admin Routes
================================
*/
// Login 
Route::controller(AdminAccountController::class)->name('login.')->prefix('login')->group(function(){
    Route::get('/', 'login')->name('index');
    Route::post('/', 'loginStore')->name('loginStore');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    // logout 
    Route::get('/logout', [AdminAccountController::class, 'logout'])->name('logout');

    // dashboard 
    Route::controller(AdminDashboardController::class)->name('dashboard.')->group(function(){
        Route::any('/', 'index')->name('index');
        Route::get('/lab-report-edit/{type}', 'labReportEdit')->name('labReportEdit');
        Route::get('/doctor-status', 'doctorStatus')->name('doctorStatus');

        // excel 
        Route::get('/excel-invoice', 'excelInvoice')->name('excelInvoice');
    });

    // user 
    Route::controller(AdminAccountController::class)->name('user.')->prefix('user')->group(function(){
        Route::get('/', 'user')->name('index')->middleware('permission:User View');
        Route::get('/create', 'create')->name('create')->middleware('permission:User Add');
        Route::post('/store', 'store')->name('store')->middleware('permission:User Add');
        Route::get('/edit/{user}', 'edit')->name('edit')->middleware('permission:User Edit');
        Route::post('/update/{user}', 'update')->name('update')->middleware('permission:User Edit');
        Route::get('/delete/{user}', 'delete')->name('delete')->middleware('permission:User Delete');
    });
    // role 
    Route::controller(AdminAccountController::class)->name('role.')->prefix('role')->group(function(){
        Route::get('/', 'role')->name('index');//->middleware('permission:User Role View');
        Route::get('/role/create', 'roleCreate')->name('roleCreate');//->middleware('permission:User Role Add');
        Route::post('/role/store', 'roleStore')->name('roleStore');//->middleware('permission:User Role Add');
        Route::get('/role/edit/{role}', 'roleEdit')->name('roleEdit');//->middleware('permission:User Role Edit');
        Route::post('/role/update/{role}', 'roleUpdate')->name('roleUpdate');//->middleware('permission:User Role Edit');
        Route::get('/role/delete/{role}', 'roleDelete')->name('roleDelete');//->middleware('permission:User Role Delete');
    });
    // patient 
    Route::controller(AdminAccountController::class)->name('patient.')->prefix('parents')->group(function(){
        Route::get('/', 'patient')->name('index')->middleware('permission:Patient View');
        Route::get('/patient/create', 'patientCreate')->name('add')->middleware('permission:Patient Add');
        Route::post('/patient/store', 'patientStore')->name('store')->middleware('permission:Patient Add');
        Route::get('/patient/edit/{patient}', 'patientEdit')->name('edit')->middleware('permission:Patient Edit');
        Route::post('/patient/update/{patient}', 'patientUpdate')->name('update')->middleware('permission:Patient Edit');
        Route::get('/patient/delete/{patient}', 'patientDelete')->name('delete')->middleware('permission:Patient Delete');
    });

    /*
    ==================
    service settings 
    ==================
    */
    Route::controller(AdminServiceController::class)->group(function(){
        // service
        Route::prefix('service')->name('service.')->group(function(){
            Route::get('/', 'service')->name('index')->middleware('permission:Service View');
            Route::get('/add', 'addService')->name('add')->middleware('permission:Service Add');
            Route::post('/store', 'storeService')->name('store')->middleware('permission:Service Add');
            Route::get('/edit/{service}', 'editService')->name('edit')->middleware('permission:Service Edit');
            Route::post('/update/{service}', 'updateService')->name('update')->middleware('permission:Service Edit');
            Route::get('/delete/{service}', 'deleteService')->name('delete')->middleware('permission:Service Delete');
        });

        // service-category
        Route::prefix('service-category')->name('serviceCategory.')->group(function(){
            Route::get('/', 'category')->name('index')->middleware('permission:Service Category View');
            Route::get('/add', 'addCategory')->name('add')->middleware('permission:Service Category Add');
            Route::post('/store', 'storeCategory')->name('store')->middleware('permission:Service Category Add');
            Route::get('/edit/{category}', 'editCategory')->name('edit')->middleware('permission:Service Category Edit');
            Route::post('/update/{category}', 'updateCategory')->name('update')->middleware('permission:Service Category Edit');
            Route::get('/delete/{category}', 'deleteCategory')->name('delete')->middleware('permission:Service Category Delete');
        });
    });

    /*
    ==================
    Posts 
    ==================
    */
    Route::controller(AdminPostController::class)->prefix('post')->name('post.')->group(function(){
        // post
        Route::get('/', 'post')->name('index')->middleware('permission:Blog View');
        Route::get('/add', 'addPost')->name('add')->middleware('permission:Blog Add');
        Route::post('/store', 'storePost')->name('store')->middleware('permission:Blog Add');
        Route::get('/edit/{post}', 'editPost')->name('edit')->middleware('permission:Blog Edit');
        Route::post('/update/{post}', 'updatePost')->name('update')->middleware('permission:Blog Edit');
        Route::get('/delete/{post}', 'deletePost')->name('delete')->middleware('permission:Blog Delete');

        // category
        Route::prefix('category')->name('category.')->group(function(){
            Route::get('/', 'category')->name('index')->middleware('permission:Blog Category View');
            Route::get('/add', 'addCategory')->name('add')->middleware('permission:Blog Category Add');
            Route::post('/store', 'storeCategory')->name('store')->middleware('permission:Blog Category Add');
            Route::get('/edit/{category}', 'editCategory')->name('edit')->middleware('permission:Blog Category Edit');
            Route::post('/update/{category}', 'updateCategory')->name('update')->middleware('permission:Blog Category Edit');
            Route::get('/delete/{category}', 'deleteCategory')->name('delete')->middleware('permission:Blog Category Delete');
        });
    });

    /*
    ==================
    Products
    ==================
    */
    Route::controller(AdminProductsController::class)->prefix('product')->name('product.')->group(function(){
        // product
        Route::prefix('list')->name('list.')->group(function(){
            Route::get('/', 'product')->name('index')->middleware('permission:Product View');
            Route::get('/add', 'addProduct')->name('add')->middleware('permission:Product Add');
            Route::post('/store', 'storeProduct')->name('store')->middleware('permission:Product Add');
            Route::get('/edit/{product}', 'editProduct')->name('edit')->middleware('permission:Product Edit');
            Route::post('/update/{product}', 'updateProduct')->name('update')->middleware('permission:Product Edit');
            Route::get('/delete/{product}', 'deleteProduct')->name('delete')->middleware('permission:Product Delete');

            // api 
            Route::post('/get-plan', 'getPlanProduct')->name('getPlan');
            Route::post('/get-category', 'getCategoryProduct')->name('getCategory');
        });

        // packages
        Route::prefix('package')->name('package.')->group(function(){
            Route::get('/', 'package')->name('index')->middleware('permission:Package View');
            Route::get('/add', 'addPackage')->name('add')->middleware('permission:Package Add');
            Route::post('/store', 'storePackage')->name('store')->middleware('permission:Package Add');
            Route::get('/edit/{package}', 'editPackage')->name('edit')->middleware('permission:Package Edit');
            Route::post('/update/{package}', 'updatePackage')->name('update')->middleware('permission:Package Edit');
            Route::get('/delete/{package}', 'deletePackage')->name('delete')->middleware('permission:Package Delete');
        });

        // plan
        Route::prefix('plan')->name('plan.')->group(function(){
            Route::get('/', 'plan')->name('index')->middleware('permission:Plan View');
            Route::get('/add', 'addPlan')->name('add')->middleware('permission:Plan Add');
            Route::post('/store', 'storePlan')->name('store')->middleware('permission:Plan Add');
            Route::get('/edit/{plan}', 'editPlan')->name('edit')->middleware('permission:Plan Edit');
            Route::post('/update/{plan}', 'updatePlan')->name('update')->middleware('permission:Plan Edit');
            Route::get('/delete/{plan}', 'deletePlan')->name('delete')->middleware('permission:Plan Delete');
        });

        // category
        Route::prefix('category')->name('category.')->group(function(){
            Route::get('/', 'category')->name('index')->middleware('permission:Product Category View');
            Route::get('/add', 'addCategory')->name('add')->middleware('permission:Product Category Add');
            Route::post('/store', 'storeCategory')->name('store')->middleware('permission:Product Category Add');
            Route::get('/edit/{category}', 'editCategory')->name('edit')->middleware('permission:Product Category Edit');
            Route::post('/update/{category}', 'updateCategory')->name('update')->middleware('permission:Product Category Edit');
            Route::get('/delete/{category}', 'deleteCategory')->name('delete')->middleware('permission:Product Category Delete');
        });

        // review
        Route::prefix('review')->name('review.')->group(function(){
            Route::get('/', 'review')->name('index')->middleware('permission:Review View');
            Route::get('/add', 'addReview')->name('add')->middleware('permission:Review Add');
            Route::post('/store', 'storeReview')->name('store')->middleware('permission:Review Add');
            Route::get('/edit/{review}', 'editReview')->name('edit')->middleware('permission:Review Edit');
            Route::post('/update/{review}', 'updateReview')->name('update')->middleware('permission:Review Edit');
            Route::get('/update-status/{review}', 'updateReviewStatus')->name('updateStatus')->middleware('permission:Review Edit');
            Route::get('/feature/{review}', 'featureReview')->name('feature')->middleware('permission:Review Edit');
            Route::get('/delete/{review}', 'deleteReview')->name('delete')->middleware('permission:Review Delete');
        });

        // order
        Route::prefix('order')->name('order.')->group(function(){
            Route::get('/pending', 'pending')->name('pending');
            Route::get('/success', 'success')->name('success');
            Route::get('/rejected', 'rejected')->name('rejected');

            Route::get('/accept/{order}', 'accept')->name('accept');
            Route::get('/reject/{order}', 'reject')->name('reject');
            Route::get('/delete/{order}', 'delete')->name('delete');
        });
    });
    
    /*
    ==================
    consultant
    ==================
    */
    Route::controller(AdminConsultantController::class)->prefix('consultant')->name('consultant.')->group(function(){
        Route::get('/', 'consultant')->name('index')->middleware('permission:Consultant View');
        Route::get('/add', 'addConsultant')->name('add')->middleware('permission:Consultant Add');
        Route::post('/store', 'storeConsultant')->name('store')->middleware('permission:Consultant Add');
        Route::get('/edit/{consultant}', 'editConsultant')->name('edit')->middleware('permission:Consultant Edit');
        Route::post('/update/{consultant}', 'updateConsultant')->name('update')->middleware('permission:Consultant Edit');
        Route::get('/delete/{consultant}', 'deleteConsultant')->name('delete')->middleware('permission:Consultant Delete');
    });

    /*
    ==================
    gallery
    ==================
    */
    Route::controller(AdminGalleryController::class)->prefix('gallery')->name('gallery.')->group(function(){
        Route::get('/', 'gallery')->name('index')->middleware('permission:Gallery View');
        Route::get('/add', 'addgallery')->name('add')->middleware('permission:Gallery Add');
        Route::post('/store', 'storegallery')->name('store')->middleware('permission:Gallery Add');
        Route::get('/edit/{gallery}', 'editgallery')->name('edit')->middleware('permission:Gallery Edit');
        Route::post('/update/{gallery}', 'updategallery')->name('update')->middleware('permission:Gallery Edit');
        Route::get('/delete/{gallery}', 'deletegallery')->name('delete')->middleware('permission:Gallery Delete');
    });

    /*
    ==================
    general settings 
    ==================
    */
    Route::controller(AdminGeneralSettingController::class)->group(function(){
        // branch
        Route::prefix('branch')->name('branch.')->group(function(){
            Route::get('/', 'branch')->name('index')->middleware('permission:Branch View');
            Route::get('/add', 'addbranch')->name('add')->middleware('permission:Branch Add');
            Route::post('/store', 'storebranch')->name('store')->middleware('permission:Branch Add');
            Route::get('/edit/{branch}', 'editbranch')->name('edit')->middleware('permission:Branch Edit');
            Route::post('/update/{branch}', 'updatebranch')->name('update')->middleware('permission:Branch Edit');
            Route::get('/delete/{branch}', 'deletebranch')->name('delete')->middleware('permission:Branch Delete');
        });

        // Slider
        Route::prefix('slider')->name('slider.')->group(function(){
            Route::get('/', 'slider')->name('index')->middleware('permission:Slider View');
            Route::get('/add', 'addSlider')->name('add')->middleware('permission:Slider Add');
            Route::post('/store', 'storeSlider')->name('store')->middleware('permission:Slider Add');
            Route::get('/edit/{slider}', 'editSlider')->name('edit')->middleware('permission:Slider Edit');
            Route::post('/update/{slider}', 'updateSlider')->name('update')->middleware('permission:Slider Edit');
            Route::get('/delete/{slider}', 'deleteSlider')->name('delete')->middleware('permission:Slider Delete');
        });

        // General
        Route::prefix('general')->name('general.')->group(function(){
            Route::get('/', 'general')->name('index')->middleware('permission:General View');
            Route::post('/update', 'updateGeneral')->name('update')->middleware('permission:General View');
        });

        // General
        Route::prefix('seo')->name('seo.')->group(function(){
            Route::get('/', 'seo')->name('index')->middleware('permission:General View');
            Route::post('/update', 'updateGeneral')->name('update')->middleware('permission:General View');
        });
    });


    /*
    ==================
    Career
    ==================
    */
    Route::controller(AdminCareerController::class)->group(function(){
        // Career
        Route::prefix('career')->name('career.')->group(function(){
            Route::get('/', 'career')->name('index')->middleware('permission:Career View');
            Route::get('/add', 'addCareer')->name('add')->middleware('permission:Career Add');
            Route::post('/store', 'storeCareer')->name('store')->middleware('permission:Career Add');
            Route::get('/edit/{career}', 'editCareer')->name('edit')->middleware('permission:Career Edit');
            Route::post('/update/{career}', 'updateCareer')->name('update')->middleware('permission:Career Edit');
            Route::get('/delete/{career}', 'deleteCareer')->name('delete')->middleware('permission:Career Delete');
        });
    });

    /*
    ==================
    Test
    ==================
    */
    Route::controller(AdminTestController::class)->prefix('test')->name('test.')->group(function(){
        Route::get('/', 'test')->name('index')->middleware('permission:Test View');
        Route::get('/add', 'addTest')->name('add')->middleware('permission:Test Add');
        Route::post('/store', 'storeTest')->name('store')->middleware('permission:Test Add');
        Route::get('/edit/{test}', 'editTest')->name('edit')->middleware('permission:Test Edit');
        Route::post('/update/{test}', 'updateTest')->name('update')->middleware('permission:Test Edit');
        Route::get('/report', 'report')->name('report')->middleware('permission:Test Edit');
        Route::get('/delete/{test}', 'deleteTest')->name('delete')->middleware('permission:Test Delete');
    });

    // Lab test 
    Route::controller(AdminLabTestController::class)->prefix('lab')->name('lab.')->group(function(){
        // test
        Route::prefix('test')->name('test.')->group(function(){
            // all 
            Route::prefix('all')->name('all.')->group(function(){
                Route::get('/', 'all')->name('index')->middleware('permission:Lap Diognosis View');
                Route::any('/add/{template?}', 'addAll')->name('add')->middleware('permission:Lap Diognosis Add');
                Route::get('/edit/{all}', 'editAll')->name('edit')->middleware('permission:Lap Diognosis Edit');
                Route::get('/delete/{all}', 'deleteAll')->name('delete')->middleware('permission:Lap Diognosis Delete');
                Route::get('/print/{prescription}', 'printAll')->name('print')->middleware('permission:Lap Diognosis Edit');
            });

            // template 
            Route::prefix('template')->name('template.')->group(function(){
                Route::get('/', 'template')->name('index')->middleware('permission:Lap Diognosis Template View');
                Route::any('/add', 'addTemplate')->name('add')->middleware('permission:Lap Diognosis Template Add');
                Route::any('/edit/{template}', 'editTemplate')->name('edit')->middleware('permission:Lap Diognosis Template Edit');
                Route::get('/delete/{template}', 'deleteTemplate')->name('delete')->middleware('permission:Lap Diognosis Template Delete');
            });
        });

        // general 
        Route::prefix('general')->name('general.')->group(function(){
            Route::POST('/save-report', 'saveReport')->name('saveReport');
            Route::POST('/parents-info', 'parentsInfo')->name('parentsInfo');
            Route::POST('/patient-info', 'patientInfo')->name('patientInfo');
        });

        // task 
        Route::prefix('task')->name('task.')->group(function(){
            Route::get('/', 'task')->name('index')->middleware('permission:Lab Task View');
            Route::get('/status/{task}', 'statusTest')->name('status')->middleware('permission:Lab Task Status');
            Route::get('/delete/{task}', 'deleteTest')->name('delete')->middleware('permission:Lab Task Delete');
        });

    });

    // Lab Diognosis 
    Route::controller(AdminLabDiognosisController::class)->prefix('lab-diognosis')->name('lab-diognosis.')->group(function(){
        // Biochemical 
        Route::prefix('biochemical')->name('biochemical.')->group(function(){
            Route::get('/', 'biochemical')->name('index'); //->middleware('permission:Lap Diognosis View');
            Route::get('/add', 'biochemicalAdd')->name('add'); //->middleware('permission:Lap Diognosis Add');
            Route::post('/create', 'biochemicalCreate')->name('create'); //->middleware('permission:Lap Diognosis Add');
            Route::get('/edit/{prescription}', 'biochemicalEdit')->name('edit'); //->middleware('permission:Lap Diognosis Edit');
            Route::get('/update/{prescription}', 'biochemicalUpdate')->name('update'); //->middleware('permission:Lap Diognosis Edit');
            Route::get('/delete/{prescription}', 'biochemicalDelete')->name('delete'); //->middleware('permission:Lap Diognosis Delete');
            Route::get('/print/{prescription}', 'biochemicalPrint')->name('print'); //->middleware('permission:Lap Diognosis Delete');
            Route::POST('/patient-info', 'patientInfo')->name('patientInfo');
            Route::POST('/parents-info', 'parentsInfo')->name('parentsInfo');
        });

        // cbc 
        Route::prefix('cbc')->name('cbc.')->group(function(){
            Route::get('/', 'cbc')->name('index'); //->middleware('permission:Lap Diognosis View');
            Route::get('/add', 'cbcAdd')->name('add'); //->middleware('permission:Lap Diognosis Add');
            Route::post('/create', 'cbcCreate')->name('create'); //->middleware('permission:Lap Diognosis Add');
            Route::get('/edit/{prescription}', 'cbcEdit')->name('edit'); //->middleware('permission:Lap Diognosis Edit');
            Route::get('/update/{prescription}', 'cbcUpdate')->name('update'); //->middleware('permission:Lap Diognosis Edit');
            Route::get('/delete/{prescription}', 'cbcDelete')->name('delete'); //->middleware('permission:Lap Diognosis Delete');
            Route::get('/print/{prescription}', 'cbcPrint')->name('print'); //->middleware('permission:Lap Diognosis Delete');
            Route::POST('/patient-info', 'patientInfo')->name('patientInfo');
            Route::POST('/parents-info', 'parentsInfo')->name('parentsInfo');
            Route::get('/ref-values', 'refValues')->name('refValues');
        });

    });

    /*
    ==================
    medicine
    ==================
    */
    Route::controller(AdminMedicineController::class)->prefix('medicine')->name('medicine.')->group(function(){
        Route::get('/', 'medicine')->name('index')->middleware('permission:Medicine View');
        Route::get('/add', 'addMedicine')->name('add')->middleware('permission:Medicine Add');
        Route::post('/store', 'storeMedicine')->name('store')->middleware('permission:Medicine Add');
        Route::get('/edit/{medicine}', 'editMedicine')->name('edit')->middleware('permission:Medicine Edit');
        Route::post('/update/{medicine}', 'updateMedicine')->name('update')->middleware('permission:Medicine Edit');
        Route::get('/delete/{medicine}', 'deleteMedicine')->name('delete')->middleware('permission:Medicine Delete');

        // category
        Route::prefix('category')->name('category.')->group(function(){
            Route::get('/', 'category')->name('index')->middleware('permission:Medicine Category View');
            Route::get('/add', 'addMedicineCategory')->name('add')->middleware('permission:Medicine Category Add');
            Route::post('/store', 'storeMedicineCategory')->name('store')->middleware('permission:Medicine Category Add');
            Route::get('/edit/{category}', 'editMedicineCategory')->name('edit')->middleware('permission:Medicine Category Edit');
            Route::post('/update/{category}', 'updateMedicineCategory')->name('update')->middleware('permission:Medicine Category Edit');
            Route::get('/delete/{category}', 'deleteMedicineCategory')->name('delete')->middleware('permission:Medicine Category Delete');
        });

        // route
        Route::prefix('route')->name('route.')->group(function(){
            Route::get('/', 'route')->name('index')->middleware('permission:Medicine Route View');
            Route::get('/add', 'addMedicineRoute')->name('add')->middleware('permission:Medicine Route Add');
            Route::post('/store', 'storeMedicineRoute')->name('store')->middleware('permission:Medicine Route Add');
            Route::get('/edit/{route}', 'editMedicineRoute')->name('edit')->middleware('permission:Medicine Route Edit');
            Route::post('/update/{route}', 'updateMedicineRoute')->name('update')->middleware('permission:Medicine Route Edit');
            Route::get('/delete/{route}', 'deleteMedicineRoute')->name('delete')->middleware('permission:Medicine Route Delete');
        });

        // frequency
        Route::prefix('frequency')->name('frequency.')->group(function(){
            Route::get('/', 'frequency')->name('index')->middleware('permission:Medicine Frequency View');
            Route::get('/add', 'addMedicineFrequency')->name('add')->middleware('permission:Medicine Frequency Add');
            Route::post('/store', 'storeMedicineFrequency')->name('store')->middleware('permission:Medicine Frequency Add');
            Route::get('/edit/{frequency}', 'editMedicineFrequency')->name('edit')->middleware('permission:Medicine Frequency Edit');
            Route::post('/update/{frequency}', 'updateMedicineFrequency')->name('update')->middleware('permission:Medicine Frequency Edit');
            Route::get('/delete/{frequency}', 'deleteMedicineFrequency')->name('delete')->middleware('permission:Medicine Frequency Delete');
        });
    });

    /*
    ==================
    Pets
    ==================
    */
    Route::controller(AdminPetsController::class)->prefix('pet')->name('pet.')->group(function(){
        Route::get('/', 'pet')->name('index')->middleware('permission:Patient View');
        Route::get('/create', 'petCreate')->name('add')->middleware('permission:Patient Add');
        Route::post('/store', 'petStore')->name('store')->middleware('permission:Patient Add');
        Route::get('/edit/{pet}', 'petEdit')->name('edit')->middleware('permission:Patient Edit');
        Route::post('/update/{pet}', 'petUpdate')->name('update')->middleware('permission:Patient Edit');
        Route::get('/delete/{pet}', 'petDelete')->name('delete')->middleware('permission:Patient Delete');
        Route::post('/add-parents', 'petAddParents')->name('addParents');
        Route::get('/registration/{user?}', 'registration')->name('registration')->middleware('permission:Client Registration');
        Route::post('/registration', 'registrationSubmit')->name('registrationSubmit')->middleware('permission:Client Registration');

        // species
        Route::prefix('species')->name('species.')->group(function(){
            Route::get('/', 'species')->name('index')->middleware('permission:Patient Species View');
            Route::get('/add', 'addSpecies')->name('add')->middleware('permission:Patient Species Add');
            Route::post('/store', 'storeSpecies')->name('store')->middleware('permission:Patient Species Add');
            Route::get('/edit/{species}', 'editSpecies')->name('edit')->middleware('permission:Patient Species Edit');
            Route::post('/update/{species}', 'updateSpecies')->name('update')->middleware('permission:Patient Species Edit');
            Route::get('/delete/{species}', 'deleteSpecies')->name('delete')->middleware('permission:Patient Species Delete');
        });
    });

    /*
    ==================
    prescription
    ==================
    */
    Route::controller(AdminPrescriptionController::class)->prefix('prescription')->name('prescription.')->group(function(){
        Route::get('/', 'prescription')->name('index')->middleware('permission:Prescription View');
        Route::get('/add', 'addPrescription')->name('add')->middleware('permission:Prescription Add');
        Route::post('/store', 'storePrescription')->name('store')->middleware('permission:Prescription Add');
        Route::get('/edit/{prescription}', 'editPrescription')->name('edit')->middleware('permission:Prescription Edit');
        Route::post('/update/{prescription}', 'updatePrescription')->name('update')->middleware('permission:Prescription Edit');
        Route::get('/delete/{prescription}', 'deletePrescription')->name('delete')->middleware('permission:Prescription Delete');
        Route::post('/user-info', 'userInfoPrescription')->name('userInfo');
        Route::post('/pet-info', 'petInfoPrescription')->name('petInfo');
        Route::get('/info', 'info')->name('info');
        Route::post('/saved-info/{id}', 'savedinfo')->name('savedinfo');
        Route::get('/print/{prescription}', 'print')->name('print');
        Route::post('/user-pet-add', 'userPetAdd')->name('userPetAdd');
        Route::post('/add-search-history', 'addSearchHistory')->name('addSearchHistory');
        Route::post('/get-search-history', 'getSearchHistory')->name('getSearchHistory');
    });
    

    /*
    ==================
    Invoice
    ==================
    */
    Route::controller(AdminInvoiceController::class)->prefix('invoice')->name('invoice.')->group(function(){
        Route::get('/', 'invoice')->name('index')->middleware('permission:Invoice View');
        Route::any('/add', 'addInvoice')->name('add')->middleware('permission:Invoice Add');
        Route::get('/print/{invoice}', 'printInvoice')->name('print')->middleware('permission:Invoice Print');
        Route::any('/edit/{invoice}', 'editInvoice')->name('edit')->middleware('permission:Invoice Edit');
        Route::get('/delete/{invoice}', 'deleteInvoice')->name('delete')->middleware('permission:Invoice Delete');
        Route::any('/paid/{invoice}', 'paidInvoice')->name('paid')->middleware('permission:Invoice Edit');

        // service
        Route::prefix('service')->name('service.')->group(function(){
            Route::get('/', 'service')->name('index')->middleware('permission:Invoice Service View');
            Route::any('/add', 'addService')->name('add')->middleware('permission:Invoice Service Add');
            Route::any('/edit/{service}', 'editService')->name('edit')->middleware('permission:Invoice Service Edit');
            Route::get('/delete/{service}', 'deleteService')->name('delete')->middleware('permission:Invoice Service Delete');
        });

        // equipment
        Route::prefix('equipment/{type}')->name('equipment.')->group(function(){
            Route::get('/', 'equipment')->name('index')->middleware('permission:Invoice Equipment View');
            Route::any('/add', 'addEquipment')->name('add')->middleware('permission:Invoice Equipment Add');
            Route::any('/edit/{equipment}', 'editEquipment')->name('edit')->middleware('permission:Invoice Equipment Edit');
            Route::get('/delete/{equipment}', 'deleteEquipment')->name('delete')->middleware('permission:Invoice Equipment Delete');
        });

        // transaction
        Route::prefix('transaction')->name('transaction.')->group(function(){
            Route::get('/', 'transaction')->name('index');//->middleware('permission:Invoice View');
            Route::get('/view/{invoice}', 'viewTransaction')->name('view');//->middleware('permission:Invoice Equipment Delete');
        });
    });

    /*
    ==================
    addAppointment
    ==================
    */
    Route::controller(AdminAppointmentController::class)->prefix('appointment')->name('appointment.')->group(function(){
        Route::get('/', 'appointment')->name('index')->middleware('permission:Appointment View');
        Route::get('/unauthorized', 'unauthorizedAppointment')->name('unauthorized')->middleware('permission:Appointment View');
        Route::any('/add', 'addAppointment')->name('add')->middleware('permission:Appointment Add');
        Route::any('/edit/{appointment}', 'editAppointment')->name('edit')->middleware('permission:Appointment Edit');
        Route::get('/delete/{appointment}', 'deleteAppointment')->name('delete')->middleware('permission:Appointment Delete');
        Route::get('/status/{appointment}', 'statusAppointment')->name('status')->middleware('permission:Appointment Status');
    });
});