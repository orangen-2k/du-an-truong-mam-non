@extends('layouts.main')
@section('title', "Thiết lập năm học")
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
@section('style')
<style>
    .error{
        color: red;
    }
    #name-error, #StartDate-error, #EndDate-error{
        color: red;
    }
    .treeview-colorful {
        background: #28df99;
        color: #fff;
    }
    .treeview-colorful .treeview-colorful-items-header:hover{
        background: #99f3bd;
        color: #fff;
    }
    .treeview-colorful .treeview-colorful-items-header.open:hover{
      background: #99f3bd;
      color: #fff;
    }

    .treeview-colorful .treeview-colorful-items-header.open{
      border-bottom: 2px solid #99f3bd;
      background: #99f3bd;
      color: #fff;
    }
    
    .treeview-colorful .treeview-colorful-element:hover {
      background:  #99f3bd;
      width: 100%;
    }
    .treeview-colorful .treeview-colorful-items-header.open span{
      color: #fff;
    }
    .treeview-colorful .treeview-colorful-element.opened{
      color: #fff;
    background-color: #99f3bd;
    border: 2px solid #28df99;
    border-right: 0 solid transparent;
    }
    .treeview-colorful .treeview-colorful-element.opened:hover{
      color: #fff;
    background-color: #99f3bd;
    border: 2px solid #28df99;
    border-right: 0 solid transparent;
    }
    .treeview-colorful hr{
      border-color:  #fff;
;
    }
</style>
@endsection
@section('content')
<div class="m-content">
    <!--Begin::Section-->
    <div class="row">
        <div class="col-xl-3 " >
            <!--begin:: Widgets/Announcements 1-->
            
            <div class="treeview-colorful border border-secondary m-portlet--skin-dark">
                <div class="row">
                  <div class="col-10">
                    <p class="ml-2 mt-4">Xếp lớp năm 2020-2021</p>
                  </div>
                  <div class="col-2 mt-4 ">
                    <i class="fa fa-plus" type="button" data-toggle="modal" data-target="#exampleModal"></i>
                  </div>
                </div>
                <hr>
                <ul class="treeview-colorful-list mb-3">
                  <li class="treeview-colorful-items">
                    <a class="treeview-colorful-items-header">
                      <i class="fas fa-plus-circle"></i>
                      <span><i class="far fa-envelope-open ic-w mx-1"></i>Khối 3</span>
                        <i class="fa fa-plus " style="float: right" type="button" data-toggle="modal" data-target="#exampleModal2"></i>
                    </a>
                    <ul class="nested">
                      <li>
                        <div class="treeview-colorful-element"><i class="far fa-student ic-w mr-1"></i>Lớp 1A1
                      </li>
                      <li>
                        <div class="treeview-colorful-element"><i class="far fa-student ic-w mr-1"></i>Lớp 1A2
                      </li>
                      
                    </ul>
                  </li>
                  
                  

            <!--end:: Widgets/Announcements 1-->
        </div>
    
    </div>
        <div class="col-xl-9">
            <!--begin:: Widgets/Blog-->

            <!--begin:: Widgets/Blog-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">

                            </h3>
                        </div>
                    </div>
                </div>

            </div>
            <h3 class="m-subheader__title m-subheader__title--separator">THÔNG TIN NĂM HỌC</h3>
            <div class="m-portlet">
                <div class="m-portlet__body">
                    <div class="row">
                        <div class="col-6">
                            <label class="col-form-label">Ngày bắt đầu năm học</label>
                            <input type="text" class="form-control m-input" readonly value="20/09/2020">
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">Ngày kết thúc năm học</label>
                            <input type="text" class="form-control m-input" readonly value="20-09-2020">
                        </div>
                    </div>
                </div>

            </div>
            <!--end:: Widgets/Blog-->
        </div>
    
    <div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">TẠO NĂM HỌC MỚI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="m-form m-form--fit m-form--label-align-right" id="form-ceate" action="{{ route('nam-hoc.store')}}" method="POST">
                   @csrf
                    <div class="modal-body">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group">
                                <label>Năm học</label>
                                <input type="text" class="form-control m-input @error('name') is-invalid @enderror" name="name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group m-form__group">
                                <label>Ngày bắt đầu năm học:</label>
                                <input type="date" class="form-control m-input @error('start_date') is-invalid @enderror" name="start_date" id="StartDate">
                                @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group m-form__group">
                                <label>Ngày kết thúc năm học:</label>
                                <input type="date" class="form-control m-input @error('end_date') is-invalid @enderror" name="end_date" id="EndDate">
                                @error('end_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Cất</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--End::Section-->
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tạo khối </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group m-form__group">
          <label for="exampleInputPassword1">Tên khối:</label>
          <input type="password" class="form-control m-input m-input--square" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group m-form__group">
          <label for="exampleSelect1">Độ tuổi:</label>
          <select class="form-control m-input" id="exampleSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-success">Tạo khối</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tạo lớp </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group m-form__group row">
          <label for="example-text-input" class="col-4 col-form-label">Tên lớp:</label>
          <div class="col-8">
            <input class="form-control m-input" type="text" value="Artisanal kale" id="example-text-input">
          </div>
        </div>
        <div class="form-group m-form__group row">
          <label for="example-text-input" class="col-4 col-form-label">Giáo viên chủ nghiệm:</label>
          <div class="col-8">
            <input class="form-control m-input" type="text" value="Artisanal kale" id="example-text-input">
          </div>
        </div>
        <div class="form-group m-form__group row">
          <label for="example-text-input" class="col-4 col-form-label">Giáo viên phụ:</label>
          <div class="col-8">
            <input class="form-control m-input" type="text" value="Artisanal kale" id="example-text-input">
          </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-success">Tạo lớp</button>
      </div>
    </div>
  </div>
</div>
@endsection 
@section('script')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script language="javascript">
</script>

    <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<script>
    // Treeview Initialization
$(document).ready(function() {
  $('.treeview-colorful').mdbTreeview();
});
</script>
@endsection
