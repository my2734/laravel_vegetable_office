<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    function index()
    {
        $date = date('m/d/Y h:i:s a', time());

        $arr_list_event = [];
        $list_event = Event::get();
        foreach ($list_event as $event) {
            if (strtotime($date) <= strtotime($event->end_date)) {
                $arr_list_event[] = $event;
            }
        }

        return view('admin.event.index', compact('arr_list_event'));
    }

    function create()
    {
        return view('admin.event.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'percent'            => 'required|numeric',
            'start_date'                 => 'required',
            'end_date'                 => 'required',
        ], [
            'name.required'         => 'Vui lòng nhập tên sự kiện giảm giá',
            'percent.required'   => 'Vui lòng nhập phần trăm giảm giá',
            'percent.numeric'    => 'Nhập sai định dạng',
            'start_date.required'      => 'Nhập ngày bắt đầu giảm giá',
            'end_date.required'      => 'Nhập ngày kết thúc giảm giá'
        ]);
        $event = new Event();
        $event->name = $_POST['name'];
        $event->percent = $_POST['percent'];
        $event->description = $_POST['description'];
        $event->start_date = $_POST['start_date'];
        $event->end_date = $_POST['end_date'];

        $event->timestamp = Carbon::now()->timestamp;

        $event->save();


        return redirect()->route('event.index');
    }

    function edit($id)
    {
        $event_edit = Event::find($id);
        return view('admin.event.create', compact('event_edit'));
    }

    function update($id)
    {
        $event_edit = Event::find($id);
        $event_edit->name = isset($_POST['name']) ? $_POST['name'] : $event_edit->name;
        $event_edit->percent = isset($_POST['percent']) ? $_POST['percent'] : $event_edit->percent;
        $event_edit->description = isset($_POST['description']) ? $_POST['description'] : $event_edit->description;
        $event_edit->start_date = isset($_POST['start_date']) ? $_POST['start_date'] : $event_edit->start_date;
        $event_edit->end_date = isset($_POST['end_date']) ? $_POST['end_date'] : $event_edit->end_date;
        $event_edit->save();
        return redirect()->route('event.index');
    }

    function delete($id)
    {
        $event = Event::find($id)->delete();
        return redirect()->back();
    }
}
