<?php

use App\Http\Controllers\WEB\VerifyEmailController;
use App\Models\CampaignCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\GoogleController;
use App\Models\Campaign;

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



Route::get('/verification-email/{id}', [VerifyEmailController::class, 'verify'])->name('verification.verify');
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', function () {
        return view('admin.page.login');
    })->name('admin.login');

    Route::get('/', function () {
        return view('admin.page.index');
    })->name('admin.dashboard');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/users', function () {
        return view('admin.page.master.user');
    });

    Route::get('/users/{id}', function ($id) {
        return view('admin.page.master.user.detail', ['id' => $id]);
    })->name('admin.user.detail');

    Route::get('/profile', function () {
        return view('admin.page.profile');
    })->name('admin.profile');

    Route::get('/categories', function () {
        return view('admin.page.master.category');
    });

    Route::get('/campaigns', function () {
        return view('admin.page.master.campaign');
    });
    
    Route::get('/donations', function () {
        return view('admin.page.master.donation');
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
    return view('landing.detail_campaign', ['id' => $id]);
})->name('campaigns.detail');

Route::get('/detail-penyaluran-campaign', function () {
    return view('landing.detail_penyaluran_campaign');
});

Route::get('/detail_campaign_pemilik', function () {
    return view('landing.detail_campaign_pemilik');
});


Route::get('/konfirmasi-email', function () {
    return view('landing.konfirmasi_email');
})->name('konfirmasi-email');

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


Route::get('/pencairan-dana', function () {
    return view('landing.pencairan_dana');
});

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







