@extends('layouts.main') @section('title', 'Thông báo') @section('content')
<div class="m-content">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                <i class="flaticon-multimedia"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Thông báo
                                <small class="text-danger"
                                    >Soạn nội dung thông báo</small
                                >
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                   <form action="" method="post" onsubmit="">

                    <div class="form-group">
                      <label for="">Tiều đề thông báo:</label>
                      <textarea name="title" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung:</label>
                        <textarea name="content" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#m_modal_4">Gửi tới</button>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger">Gửi</button>
                    </div>
                   </form>
                </div>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
    <!--begin::Modal-->
						<div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">New message</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<table id="table_id" style="with: 100%">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" onclick="checkAll(this)"></th>
                                                    <th>Column 1</th>
                                                    <th>Column 2</th>
                                                    <th>Column 2</th>
                                                    <th>Column 2</th>
                                                    <th>Column 2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="checkbox" class="checkbox"></td>
                                                    <td>Row 1 Data 1</td>
                                                    <td>Row 1 Data 2</td>
                                                    <td>d</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox" class="checkbox"></td>
                                                    <td>Row 2 Data 1</td>
                                                    <td>Row 2 Data 2</td>
                                                    <td>d</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Send message</button>
									</div>
								</div>
							</div>
						</div>

						<!--end::Modal-->
</div>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>

<script>
  var editor =  CKEDITOR.replace( 'content' );
                CKEDITOR.config.height = 300;

editor.on( 'change', function( evt ) {
    console.log( 'Total bytes: ' + evt.editor.getData() );
});

</script>
<script>
    const checkAll = (e) => {
        $(e).parents('table').find('.checkbox').not(e).prop('checked', e.checked);
        };
    $(document).ready( function () {
        
        
        $("#table_id").dataTable({
            select: true,
            responsive: true
        });
} );
</script>
@endsection
