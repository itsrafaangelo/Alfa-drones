<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlertController extends Controller
{
    public function index()
    {
        $alerts = Alert::orderBy('priority', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.alerts.index', compact('alerts'));
    }

    public function toggle($id)
    {
        $alert = Alert::findOrFail($id);
        $alert->is_active = !$alert->is_active;
        $alert->save();

        return redirect()->back()->with('success', 'Alerta ' . ($alert->is_active ? 'ativado' : 'desativado') . ' com sucesso!');
    }

    public function destroy($id)
    {
        $alert = Alert::findOrFail($id);
        $alert->delete();

        return redirect()->back()->with('success', 'Alerta excluído com sucesso!');
    }
}
