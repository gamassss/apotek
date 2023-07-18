<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // pegawai
    public function indexPegawai()
    {
        $jumlahMemberTotal = Member::where('user_id', Auth::user()->id)->count();
        $query = DB::table('transaksis as t')
            ->join('members as m', 'm.id', '=', 't.member_id')
            ->join('users as u', 'u.id', '=', 'm.user_id')
            ->where('m.user_id', Auth::user()->id)
            ->select(DB::raw('COUNT(*) as totalTransactions'), DB::raw('YEAR(t.created_at) as year'))
            ->groupBy('year')
            ->get();
        $jumlahTransaksiTotal = $query->sum('totalTransactions');
        $tahunTransaksi = $query->pluck('year')->toArray();
        $tahunMember = DB::table('members as m')
            ->select(DB::raw('YEAR(m.created_at) as year'))
            ->where('user_id', Auth::user()->id)
            ->groupBy('year')
            ->get();
        $responseTime = $this->getResponseTime(Auth::user()->id);
        return view('dashboard-pegawai', compact('jumlahMemberTotal', 'jumlahTransaksiTotal', 'tahunTransaksi', 'tahunMember', 'responseTime'));

    }

    public function peningkatanMemberPegawaiMonthly(Request $request)
    {
        $currentYear = $request->year;
        if (isset($request->user)) {
            $monthlyData = Member::selectRaw("DATE_FORMAT(created_at, '%M') AS month, COUNT(*) AS count")
                ->whereYear('created_at', $currentYear)
                ->where('user_id', $request->user)
                ->groupBy('month')
                ->orderByRaw("MONTH(created_at)")
                ->get();
        } else {
            $monthlyData = Member::selectRaw("DATE_FORMAT(created_at, '%M') AS month, COUNT(*) AS count")
                ->whereYear('created_at', $currentYear)
                ->where('user_id', Auth::user()->id)
                ->groupBy('month')
                ->orderByRaw("MONTH(created_at)")
                ->get();
        }
        $bulan = $monthlyData->pluck('month')->toArray();
        $dataBulanan = $monthlyData->pluck('count')->toArray();
        return response()->json(['month' => $bulan, 'dataBulanan' => $dataBulanan]);
    }

    public function peningkatanMemberPegawaiYearly(Request $request)
    {
        if (isset($request->user)) {
            $yearlyData = Member::selectRaw("DATE_FORMAT(created_at, '%Y') AS year, COUNT(*) AS count")
                ->where('user_id', $request->user)
                ->groupBy('year')
                ->orderByRaw("YEAR(created_at)")
                ->get();
        } else {
            $yearlyData = Member::selectRaw("DATE_FORMAT(created_at, '%Y') AS year, COUNT(*) AS count")
                ->where('user_id', Auth::user()->id)
                ->groupBy('year')
                ->orderByRaw("YEAR(created_at)")
                ->get();
        }
        $year = $yearlyData->pluck('year')->toArray();
        $dataTahunan = $yearlyData->pluck('count')->toArray();
        return response()->json(['year' => $year, 'dataTahunan' => $dataTahunan]);
    }
    public function peningkatanTransaksiPegawaiYearly(Request $request)
    {

        if (isset($request->user)) {
            $yearlyData = DB::table('transaksis as t')
                ->join('members as m', 'm.id', 't.member_id')
                ->selectRaw("DATE_FORMAT(t.created_at, '%Y') AS year, COUNT(*) AS count")
                ->where('m.user_id', $request->user)
                ->groupBy('year')
                ->orderByRaw("YEAR(t.created_at)")
                ->get();
        } else {
            $yearlyData = DB::table('transaksis as t')
                ->join('members as m', 'm.id', 't.member_id')
                ->selectRaw("DATE_FORMAT(t.created_at, '%Y') AS year, COUNT(*) AS count")
                ->where('m.user_id', Auth::user()->id)
                ->groupBy('year')
                ->orderByRaw("YEAR(t.created_at)")
                ->get();
        }
        $year = $yearlyData->pluck('year')->toArray();
        $dataTahunan = $yearlyData->pluck('count')->toArray();
        return response()->json(['year' => $year, 'dataTahunan' => $dataTahunan]);
    }
    public function peningkatanTransaksiPegawaiMonthly(Request $request)
    {
        $currentYear = $request->year;
        if (isset($request->user)) {
            $monthlyData = DB::table('transaksis as t')
                ->join('members as m', 'm.id', 't.member_id')
                ->selectRaw("DATE_FORMAT(t.created_at, '%M') AS month, COUNT(*) AS count")
                ->whereYear('t.created_at', $currentYear)
                ->where('m.user_id', $request->user)
                ->groupBy('month')
                ->orderByRaw("MONTH(t.created_at)")
                ->get();
        } else {
            $monthlyData = DB::table('transaksis as t')
                ->join('members as m', 'm.id', 't.member_id')
                ->selectRaw("DATE_FORMAT(t.created_at, '%M') AS month, COUNT(*) AS count")
                ->whereYear('t.created_at', $currentYear)
                ->where('m.user_id', Auth::user()->id)
                ->groupBy('month')
                ->orderByRaw("MONTH(t.created_at)")
                ->get();

        }
        $bulan = $monthlyData->pluck('month')->toArray();
        $dataBulanan = $monthlyData->pluck('count')->toArray();
        return response()->json(['month' => $bulan, 'dataBulanan' => $dataBulanan]);
    }

    // manajemen
    public function indexManajemen()
    {
        $jumlahMemberTotal = Member::count();
        $query = DB::table('transaksis as t')
            ->join('members as m', 'm.id', '=', 't.member_id')
            ->join('users as u', 'u.id', '=', 'm.user_id')
            ->select(DB::raw('COUNT(*) as totalTransactions'), DB::raw('YEAR(t.created_at) as year'))
            ->groupBy('year')
            ->get();
        $jumlahTransaksiTotal = $query->sum('totalTransactions');
        $tahunTransaksi = $query->pluck('year')->toArray();
        $tahunMember = DB::table('members as m')
            ->select(DB::raw('YEAR(m.created_at) as year'))
            ->groupBy('year')
            ->get();
        return view('dashboard-manajemen', compact('jumlahMemberTotal', 'jumlahTransaksiTotal', 'tahunTransaksi', 'tahunMember'));

    }
    public function peningkatanMemberMonthly(Request $request)
    {
        $currentYear = $request->year;
        $monthlyData = Member::selectRaw("DATE_FORMAT(created_at, '%M') AS month, COUNT(*) AS count")
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderByRaw("MONTH(created_at)")
            ->get();
        $bulan = $monthlyData->pluck('month')->toArray();
        $dataBulanan = $monthlyData->pluck('count')->toArray();
        return response()->json(['month' => $bulan, 'dataBulanan' => $dataBulanan]);
    }
    public function peningkatanMemberYearly()
    {

        $yearlyData = Member::selectRaw("DATE_FORMAT(created_at, '%Y') AS year, COUNT(*) AS count")
            ->groupBy('year')
            ->orderByRaw("YEAR(created_at)")
            ->get();
        $year = $yearlyData->pluck('year')->toArray();
        $dataTahunan = $yearlyData->pluck('count')->toArray();
        return response()->json(['year' => $year, 'dataTahunan' => $dataTahunan]);
    }
    public function peningkatanTransaksiYearly()
    {

        $yearlyData = DB::table('transaksis as t')
            ->join('members as m', 'm.id', 't.member_id')
            ->selectRaw("DATE_FORMAT(t.created_at, '%Y') AS year, COUNT(*) AS count")
            ->groupBy('year')
            ->orderByRaw("YEAR(t.created_at)")
            ->get();
        $year = $yearlyData->pluck('year')->toArray();
        $dataTahunan = $yearlyData->pluck('count')->toArray();
        return response()->json(['year' => $year, 'dataTahunan' => $dataTahunan]);
    }
    public function peningkatanTransaksiMonthly(Request $request)
    {
        $currentYear = $request->year;
        $monthlyData = DB::table('transaksis as t')
            ->join('members as m', 'm.id', 't.member_id')
            ->selectRaw("DATE_FORMAT(t.created_at, '%M') AS month, COUNT(*) AS count")
            ->whereYear('t.created_at', $currentYear)
            ->groupBy('month')
            ->orderByRaw("MONTH(t.created_at)")
            ->get();
        $bulan = $monthlyData->pluck('month')->toArray();
        $dataBulanan = $monthlyData->pluck('count')->toArray();
        return response()->json(['month' => $bulan, 'dataBulanan' => $dataBulanan]);
    }
    public function resetPassword()
    {
        return view('reset-password-pegawai');
    }

    public function showPegawaiChats(Request $request, $id)
    {
        $id_pegawai = $id;
        $members_pegawai = Member::where('user_id', $id)->get();

        foreach ($members_pegawai as $member) {
            $latest_chat = DB::select('select * from chats
            where pengirim = ' . $member->no_telpon . '
            order by created_at desc limit 1');

            if (is_array($latest_chat) && empty($latest_chat)) {
                $member['latest_chat'] = null;
                $latest_pegawai_chat = DB::select('SELECT * FROM chats
                WHERE penerima = ' . $member->no_telpon . '
                ORDER BY id DESC
                LIMIT 1');

                $member['latest_chat'] = $latest_pegawai_chat;

                if (!empty($latest_pegawai_chat)) {
                    $res_detail = json_decode($latest_pegawai_chat[0]->res_detail, true);
                    if ($res_detail['status'] == 'true') {
                        $latest_pegawai_chat[0]->text = '<i class="fa-regular fa-clock fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_pegawai_chat[0]->text;
                    } else if ($res_detail['status'] == 'sent' && $latest_pegawai_chat[0]->state == 'sent') {
                        $latest_pegawai_chat[0]->text = '<i class="fa-solid fa-check fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_pegawai_chat[0]->text;
                    } else if ($res_detail['status'] == 'sent' && $latest_pegawai_chat[0]->state == 'delivered') {
                        $latest_pegawai_chat[0]->text = '<i class="fa-solid fa-check-double fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_pegawai_chat[0]->text;
                    } else if ($res_detail['status'] == 'sent' && $latest_pegawai_chat[0]->state == 'read') {
                        $latest_pegawai_chat[0]->text = '<i class="fa-solid fa-check-double fa-xs" style="color: #3B71CA;"></i>&nbsp;&nbsp;&nbsp;' . $latest_pegawai_chat[0]->text;
                    }
                }
                // dd($member['latest_chat']);
            } else {

                $member['latest_chat'] = $latest_chat;

                if (!empty($latest_chat)) {
                    $latest_chat_id = $latest_chat[0]->id;

                    $newer_chats = DB::select('SELECT * FROM chats
                                WHERE penerima = ' . $member->no_telpon . '
                                AND id > ' . $latest_chat_id . '
                                ORDER BY id DESC
                                LIMIT 1');

                    if (!empty($newer_chats)) {
                        $latest_chat = $newer_chats;
                        $member['latest_chat'] = $latest_chat;

                        $res_detail = json_decode($latest_chat[0]->res_detail, true);
                        if ($res_detail['status'] == 'true') {
                            $latest_chat[0]->text = '<i class="fa-regular fa-clock fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_chat[0]->text;
                        } else if ($res_detail['status'] == 'sent' && $latest_chat[0]->state == 'sent') {
                            $latest_chat[0]->text = '<i class="fa-solid fa-check fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_chat[0]->text;
                        } else if ($res_detail['status'] == 'sent' && $latest_chat[0]->state == 'delivered') {
                            $latest_chat[0]->text = '<i class="fa-solid fa-check-double fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_chat[0]->text;
                        } else if ($res_detail['status'] == 'sent' && $latest_chat[0]->state == 'read') {
                            $latest_chat[0]->text = '<i class="fa-solid fa-check-double fa-xs" style="color: #3B71CA;"></i>&nbsp;&nbsp;&nbsp;' . $latest_chat[0]->text;
                        }
                    }
                }
            }

        }
        // dd($members_pegawai);
        $members_pegawai = $members_pegawai->sortByDesc(function ($member) {
            if (isset($member['latest_chat']) && count($member['latest_chat']) > 0) {
                return $member['latest_chat'][0]->created_at;
            } else {
                // Atur tanggal yang sesuai jika 'latest_chat' tidak ada atau kosong
                return null;
            }
        });

        if ($request->ajax()) {
            return view('list_member', compact('members_pegawai'))->render();
        }

        foreach ($members_pegawai as $member) {
            $count = DB::table('chats')
                ->where('state', 'delivered')
                ->where('pengirim', $member->no_telpon)
                ->count();
            $member['unread_messages'] = $count;
        }

        $chats = [];
        return view('chat', compact('members_pegawai', 'chats', 'id_pegawai'));
    }

}
