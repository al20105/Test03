<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{

    public function destroy($encrypted) {
        $id = Crypt::decrypt($encrypted);
        $db_data = new Task;
        $db_data->where('id', $id)->delete();
        return redirect('/tasks');
    }
}