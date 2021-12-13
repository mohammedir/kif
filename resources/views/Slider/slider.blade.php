@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Slider</a></li>
                <li class="breadcrumb-item active">Page slider</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="card-body">
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">Add Slider
                    </button>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">Title</th>
                                <th class="border-bottom-0">For Desktop</th>
                                <th class="border-bottom-0">For Mobile</th>
                                <th class="border-bottom-0">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($slider as $sliders)
                                @php
                                    $i++
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $sliders->title }}</td>
                                    @if($sliders->type == 1)

                                        <td><img style="width: 150px; height: 100px;" src="{{asset('uploadslider/'.$sliders->DesktopDevice)}}"></td>

                                    @else
                                        <td>
                                            <video id="my-video" class="video-js" controls preload="auto" width="150" height="100" data-setup="{}">
                                                <source src="{{asset('uploadslider/'.$sliders->DesktopDevice)}}" type='video/mp4'>
                                            </video>
                                        </td>

                                    @endif
                                    @if($sliders->type == 1)

                                        <td><img style="width: 150px; height: 100px;" src="{{asset('uploadslider/'.$sliders->MobileDevice)}}"></td>

                                    @else
                                        <td>
                                            <video id="my-video" class="video-js" controls preload="auto" width="150" height="100" data-setup="{}">
                                                <source src="{{asset('uploadslider/'.$sliders->MobileDevice)}}" type='video/mp4'>
                                            </video>
                                        </td>

                                    @endif

                                    <td class="text-center">
                                        <input data-id="{{$sliders->id}}" class="toggle-class" type="checkbox" data-onstyle="success"
                                            data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" data-size="xs"
                                               {{$sliders->status ? 'checked' : ''}}
                                        >


                                    </td>





                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>



                </div>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>

            <!-- add -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Add Slider</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><h6>Slider title</h6></label>
                                    <input type="text" class="form-control" id="slider_title" name="slider_title" required>
                                </div>

                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref"><h6>Attachment type</h6></label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="0" selected disabled> &#45;&#45;حدد النوع&#45;&#45;</option>
                                    <option value="1" > صورة</option>
                                    <option value="2" >فيديو</option>

                                </select>

                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref"><h6>for computer</h6></label>
                                <div class="col-sm-12 col-md-12">
                                    <input type="file" name="desktop" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                           data-height="70" />
                                </div><br>

                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref"><h6>for mobile</h6></label>
                                <div class="col-sm-12 col-md-12">
                                    <input type="file" name="mobile" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                           data-height="70" />
                                </div><br>

<!--                                <div class="form-group mt-1">
                                    <input type="checkbox" value="1"
                                           name="Sliderchecbox"
                                           id="switcheryColor4"
                                           class="switchery" data-color="success"
                                           checked/>
                                    <label for="switcheryColor4"
                                           class="card-title ml-1">الحالة </label>

                                </div>-->

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">تاكيد</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

        <script>
            $(document).ready(function (){
                $("#member_table").DataTable()

            });
            $(function (){
                $('.toggle-class').change(function (){
                    var status = $(this).prop('checked') == true ? 1 : 0;
                    var slider_id = $(this).data('id');
                    $.ajax({
                        type:"GET",
                        dataType:"json",
                        url:'/changeStatus',
                        data:{'status':status,'slider_id':slider_id},
                        success:function (data){
                            console.log(data.success)
                        }

                    })
                })
            })
        </script>
@endsection
