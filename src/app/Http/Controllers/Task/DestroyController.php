<?php

namespace App\Http\Controllers\Task;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{

    public function destroy($encrypted) {
        $id = Crypt::decrypt($encrypted);
        $sql = "DELETE FROM tasks WHERE id = :id";
        $stmt = $dbh->prepare($sql);
        $params = array(':id'=>$id);
        $stmt->execute($params);
        
        return redirect('/tasks');
    }
}