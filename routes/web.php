<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Models\CampaignCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RegencyController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProvinceController;
use GeneaLabs\Phpgmaps\Facades\PhpgmapsFacade;

use App\Http\Controllers\API\CampaignController;
use App\Http\Controllers\WEB\VerifyEmailController;

use Illuminate\Support\Facades\URL;
use Jorenvh\Share\ShareFacade as Share;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('cek-mail', function () {
    return view('mail.donation');
});


Route::get('/verification-email/{id}', [VerifyEmailController::class, 'verify'])->name('verification.verify');
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
 

    Route::get('/', function (Request $request) {


        $categories = CampaignCategory::all();

        $Donation = Donation::count();
        $roleOneAdminCount = User::where('role_id', 1)->count();
        $roleOneUserCount = User::where('role_id', 2)->count();
        $Campaign = Campaign::count();
        $CampaignCategory = CampaignCategory::count();
        $campainer = User::whereHas('detail')->count();
        $donatur = User::whereDoesntHave('detail')->count();
      

        $Totaldonasi = Campaign::sum('real_time_amount');
        $Totaltarget = Campaign::sum('target_amount');
        $percentage = number_format(($Totaldonasi / $Totaltarget) * 100, 2);
        $percentage_remaining = number_format((( $Totaltarget - $Totaldonasi ) / $Totaltarget ) * 100, 2);
    
        $currentYear = Carbon::now()->format('Y');
        $currentMonth = Carbon::now()->month;
        $mingguDonations = [];
        $monthlyDonations = [];
    
        // Loop through each month in a year
        for ($month = 1; $month <= 12; $month++) {
            // Get total donations for the current month
            $result = Donation::select(DB::raw('SUM(amount_donations) as total_amount'))
                ->whereRaw('MONTH(created_at) = ?', [$month])
                ->whereRaw('YEAR(created_at) = ?', [$currentYear])
                ->get();
        
            // Extract the total amount from the result
            $totalAmount = $result[0]->total_amount;
    
            // Store the total amount for the current month
            $monthlyDonations[$month] = $totalAmount;
        }

        $firstDayOfMonth = Carbon::createFromDate($currentYear, $currentMonth, 1);
        $lastDayOfMonth = $firstDayOfMonth->endOfMonth();
        
        $mingguDonations = [];
        
        for ($week = 1; $week <= $lastDayOfMonth->weekOfMonth; $week++) {
            $startOfWeek = $firstDayOfMonth->copy()->startOfWeek()->addWeeks($week - 5);
            $endOfWeek = $startOfWeek->copy()->endOfWeek();
        
            $result = Donation::select(DB::raw('COALESCE(SUM(amount_donations), 0) as total_amount'))
                ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                ->get();
        
            $totalAmount = $result[0]->total_amount;
        
            $mingguDonations[$week] = $totalAmount;
        }

        $currentDate = Carbon::now()->format('Y-m-d');

        // Ambil waktu awal dan akhir hari ini
        $startOfDay = Carbon::parse($currentDate)->startOfDay();
        $endOfDay = Carbon::parse($currentDate)->endOfDay();
        
        // Ambil daftar pengguna yang dibuat pada hari ini, batasi hanya 10 terbaru
        $usersCreated = User::whereBetween('created_at', [$startOfDay, $endOfDay])
                            ->orderBy('created_at', 'desc')
                            ->take(10)
                            ->get();

         $userCount = $usersCreated->count();

      
        
    
        return view('admin.page.index', compact('categories','userCount','usersCreated','campainer','donatur','mingguDonations','monthlyDonations', 'Campaign', 'Donation', 'Totaldonasi', 'percentage', 'Totaltarget', 'percentage_remaining', 'roleOneUserCount', 'roleOneAdminCount', 'CampaignCategory'));
    })->name('admin.dashboard');

    

    Route::get('/login', function () {
        return view('admin.page.login' );
    })->name('admin.login');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/users', function () {

        $currentDate = Carbon::now()->format('Y-m-d');

        // Ambil waktu awal dan akhir hari ini
        $startOfDay = Carbon::parse($currentDate)->startOfDay();
        $endOfDay = Carbon::parse($currentDate)->endOfDay();
        
        // Ambil daftar pengguna yang dibuat pada hari ini, batasi hanya 10 terbaru
        $usersCreated = User::whereBetween('created_at', [$startOfDay, $endOfDay])
                            ->orderBy('created_at', 'desc')
                            ->take(10)
                            ->get();

         $userCount = $usersCreated->count();

        return view('admin.page.master.user',compact('usersCreated','userCount'));
    });

    Route::get('/users/{id}', function ($id) {
        $currentDate = Carbon::now()->format('Y-m-d');

        // Ambil waktu awal dan akhir hari ini
        $startOfDay = Carbon::parse($currentDate)->startOfDay();
        $endOfDay = Carbon::parse($currentDate)->endOfDay();
        
        // Ambil daftar pengguna yang dibuat pada hari ini, batasi hanya 10 terbaru
        $usersCreated = User::whereBetween('created_at', [$startOfDay, $endOfDay])
                            ->orderBy('created_at', 'desc')
                            ->take(10)
                            ->get();

         $userCount = $usersCreated->count();

        return view('admin.page.master.user.detail', ['id' => $id]);
    })->name('admin.user.detail');

    Route::get('/profile', function () {
        $currentDate = Carbon::now()->format('Y-m-d');

        // Ambil waktu awal dan akhir hari ini
        $startOfDay = Carbon::parse($currentDate)->startOfDay();
        $endOfDay = Carbon::parse($currentDate)->endOfDay();
        
        // Ambil daftar pengguna yang dibuat pada hari ini, batasi hanya 10 terbaru
        $usersCreated = User::whereBetween('created_at', [$startOfDay, $endOfDay])
                            ->orderBy('created_at', 'desc')
                            ->take(10)
                            ->get();

         $userCount = $usersCreated->count();

        return view('admin.page.profile',compact('usersCreated','userCount'));
    })->name('admin.profile');

    Route::get('/categories', function () {
        $currentDate = Carbon::now()->format('Y-m-d');

        // Ambil waktu awal dan akhir hari ini
        $startOfDay = Carbon::parse($currentDate)->startOfDay();
        $endOfDay = Carbon::parse($currentDate)->endOfDay();
        
        // Ambil daftar pengguna yang dibuat pada hari ini, batasi hanya 10 terbaru
        $usersCreated = User::whereBetween('created_at', [$startOfDay, $endOfDay])
                            ->orderBy('created_at', 'desc')
                            ->take(10)
                            ->get();

         $userCount = $usersCreated->count();
        return view('admin.page.master.category',compact('usersCreated','userCount'));
    });

    Route::get('/campaigns', function () {
        $currentDate = Carbon::now()->format('Y-m-d');

        // Ambil waktu awal dan akhir hari ini
        $startOfDay = Carbon::parse($currentDate)->startOfDay();
        $endOfDay = Carbon::parse($currentDate)->endOfDay();
        
        // Ambil daftar pengguna yang dibuat pada hari ini, batasi hanya 10 terbaru
        $usersCreated = User::whereBetween('created_at', [$startOfDay, $endOfDay])
                            ->orderBy('created_at', 'desc')
                            ->take(10)
                            ->get();

         $userCount = $usersCreated->count();
        return view('admin.page.master.campaign',compact('usersCreated','userCount'));
    });
    
    Route::get('/donations', function () {
        $currentDate = Carbon::now()->format('Y-m-d');

        // Ambil waktu awal dan akhir hari ini
        $startOfDay = Carbon::parse($currentDate)->startOfDay();
        $endOfDay = Carbon::parse($currentDate)->endOfDay();
        
        // Ambil daftar pengguna yang dibuat pada hari ini, batasi hanya 10 terbaru
        $usersCreated = User::whereBetween('created_at', [$startOfDay, $endOfDay])
                            ->orderBy('created_at', 'desc')
                            ->take(10)
                            ->get();

         $userCount = $usersCreated->count();
        return view('admin.page.master.donation',compact('userCount','usersCreated'));
    });
});





Route::get('/user', function () { return view('landing.index');})->name('landing');
Route::get('/', function () { return view('landing.index');})->name('home');

Route::get('/Halaman-utama', function () {
    return view('landing.utama');
})->name('afterlogin');

Route::get('/ziswaf', function () {
    return view('landing.ziswaf');
})->name('ziswaf');



Route::get('/login', function () { return view('landing.login');})->name('login');
Route::get('/registrasi', function () { return view('landing.registrasi');})->name('register');

// Route::get('/login', function () {
//     return view('landing.auth.login');
// });

Route::get('/daftar', function () {
    return view('landing.auth.daftar');
});

Route::get('/all-campaign', function () {
    return view('landing.all_campaign');
})->name('all-campaign');

Route::get('/kategori/{id}', function ($id) {
    $category = CampaignCategory::findOrFail($id);
    return view('landing.kategori', ['id' => $id, 'category' => $category]);
})->name('kategori');

Route::get('/ajukan-campaign', function () {
    return view('landing.ajukan_campaign');
})->name('ajukan-campaign');


Route::get('/campaign-akun', function () {
    return view('landing.campaign_akun');
});

Route::get('/campaign-pending', function () {
    return view('landing.campaign_pending');
})->name('campaign-pending');

Route::get('/detail-campaign/{id}', function ($id) {
    $url = route('campaigns.detail', $id);
   
    return view('landing.detail_campaign', compact('id','url'));
})->name('campaigns.detail');


Route::get('/detail-penyaluran-campaign', function () {
    return view('landing.detail_penyaluran_campaign');
});

Route::get('/detail_campaign_pemilik/{id}', function ($id) {
    $url = route('campaigns.detail', $id);
   

    return view('landing.detail_campaign_pemilik',  compact('id','url'));
})->name('campaigns.pemilik');


Route::get('/konfirmasi-email', function () {
    return view('landing.konfirmasi_email');
})->name('konfirmasi-email');

Route::get('/konfirmasi-sukses', function () {
    return view('landing.konfirmasi_email_sukses');
})->name('konfirmasi-sukses');

Route::get('/konfiramsi-gagal', function () {
    return view('landing.konfirmasi_email_gagal');
})->name('konfirmasi-gagal');

Route::get('/payment-gagal', function () {
    return view('landing.payment_gagal');
});

Route::get('/payment-sukses', function () {
    return view('landing.payment_sukses');
});




Route::get('/profile', function () {
    return view('landing.profile.profile');
})->name('profile');


Route::get('/profile-campaign', function () {
    return view('landing.profile.campaign');
});


Route::get('/donasi', function () {
    return view('landing.profile.donasi');
});

Route::get('/buat-campaign', function () {
    return view('landing.buat_campaign');
});


// Route::get('/pencairan-dana', function () {
//     return view('landing.pencairan_dana');
// });

Route::get('/pencairan-dana/{id}', function ($id) {
    $campaign = Campaign::findOrFail($id);
    return view('landing.pencairan_dana', [
        'id' => $id,
        'campaign' => $campaign,
    ]);
});

Route::get('/verifikasi-pencairan', function () {
    return view('landing.verifikasi_pencairan');
})->name('verifikasi-pencairan');

Route::get('/donasi/{id}', function ($id) {
    $campaign = Campaign::findOrFail($id);
    return view('landing.donasi', [
        'id' => $id,
        'campaign' => $campaign,
    ]);
});


Route::get('/awal-campaign', function () {
    return view('landing.awal_kategori');

    Route::get('/campaigns', function () {
        return view('admin.page.master.campaign');
    });
    
    Route::get('/donations', function () {
        return view('admin.page.master.donation');
    });
});


Route::get('/faq', function () {
    return view('landing.faq');
});

Route::get('/tentang-kami', function () {
    return view('landing.abouts');
});

Route::get('/zakat', function () {
    return view('landing.ziswaf.zakat');
});

Route::get('/infaq', function () {
    return view('landing.ziswaf.infaq');
});

Route::get('/sedekah', function () {
    return view('landing.ziswaf.sedekah');
});


Route::get('/bayar', function () {
    return view('landing.ziswaf.bayar');
});













Route::get('/user', function () { return view('landing.index');})->name('landing');
// Route::get('/', function () { return view('landing.page');})->name('index');
// Route::get('/loginuser', function () { return view('landing.login');})->name('login');
// Route::get('/registrasi', function () { return view('landing.registrasi');})->name('register');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('provinces/select2', [ProvinceController::class, 'select2']);
Route::get('regencies/select2', [RegencyController::class, 'select2']);
Route::get('districts/select2', [DistrictController::class, 'select2']);
Route::get('villages/select2', [VillageController::class, 'select2']);








