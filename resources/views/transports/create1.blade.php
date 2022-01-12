@extends('admin.layouts.layout')

@section('content')
<div class="container py-4">
    <div class="row">
      <div class="col-md-12 form_sec_outer_task border">
        <div class="row">
          <div class="col-md-12 bg-light p-2 mb-3">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                    <h4 class="frm_section_n">Form Title</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <label>Mobile No.</label>
          </div>
          <div class="col-md-4">
            <label> Type </label>
          </div>
        </div>
        <div class="col-md-12 p-0">
          <div class="col-md-12 form_field_outer p-0">
            <div class="row form_field_outer_row">
              <div class="form-group col-md-6">
                <input type="text" class="form-control w_90" name="mobileb_no[]" id="mobileb_no_1" placeholder="Enter mobiel no." />
              </div>
              <div class="form-group col-md-4">
                <select name="no_type[]" id="no_type_1" class="form-control">
                  <option>--Select type--</option>
                  <option>Personal No.</option>
                  <option>Company No.</option>
                  <option>Parents No.</option>
                </select>
              </div>
              <div class="form-group col-md-2 add_del_btn_outer">
                <button class="btn_round add_node_btn_frm_field" title="Copy or clone this row">
                  <i class="fas fa-copy"></i>
                </button>
  
                <button class="btn_round remove_node_btn_frm_field" disabled>
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row ml-0 bg-light mt-3 border py-3">
        <div class="col-md-12">
          <button class="btn btn-outline-lite py-0 add_new_frm_field_btn"><i class="fas fa-plus add_icon"></i> Add New field row</button>
        </div>
      </div>
    </div>
  </div>

  <style>
      .btn_round {
  width: 35px;
  height: 35px;
  display: inline-block;
  border-radius: 50%;
  text-align: center;
  line-height: 35px;
  margin-left: 10px;
  border: 1px solid #ccc;
  cursor: pointer;
}
.btn_round:hover {
  color: #fff;
  background: #6b4acc;
  border: 1px solid #6b4acc;
}

.btn_content_outer {
  display: inline-block;
  width: 85%;
}
.close_c_btn {
  width: 30px;
  height: 30px;
  position: absolute;
  right: 10px;
  top: 0px;
  line-height: 30px;
  border-radius: 50%;
  background: #ededed;
  border: 1px solid #ccc;
  color: #ff5c5c;
  text-align: center;
  cursor: pointer;
}

.add_icon {
  padding: 10px;
  border: 1px dashed #aaa;
  display: inline-block;
  border-radius: 50%;
  margin-right: 10px;
}
.add_group_btn {
  display: flex;
}
.add_group_btn i {
  font-size: 32px;
  display: inline-block;
  margin-right: 10px;
}

.add_group_btn span {
  margin-top: 8px;
}
.add_group_btn,
.clone_sub_task {
  cursor: pointer;
}

.sub_task_append_area .custom_square {
  cursor: move;
}

.del_btn_d {
  display: inline-block;
  position: absolute;
  right: 20px;
  border: 2px solid #ccc;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  line-height: 40px;
  text-align: center;
  font-size: 18px;
}
  </style>

$(document).ready(function(){ $("body").on("click",".add_new_frm_field_btn", function (){ console.log("clicked"); var index = $(".form_field_outer").find(".form_field_outer_row").length + 1; $(".form_field_outer").append(`
<div class="row form_field_outer_row">
  <div class="form-group col-md-6">
    <input type="text" class="form-control w_90" name="mobileb_no[]" id="mobileb_no_${index}" placeholder="Enter mobiel no." />
  </div>
  <div class="form-group col-md-4">
    <select name="no_type[]" id="no_type_${index}" class="form-control">
      <option>--Select type--</option>
      <option>Personal No.</option>
      <option>Company No.</option>
      <option>Parents No.</option>
    </select>
  </div>
  <div class="form-group col-md-2 add_del_btn_outer">
    <button class="btn_round add_node_btn_frm_field" title="Copy or clone this row">
      <i class="fas fa-copy"></i>
    </button>

    <button class="btn_round remove_node_btn_frm_field" disabled>
      <i class="fas fa-trash-alt"></i>
    </button>
  </div>
</div>
`); $(".form_field_outer").find(".remove_node_btn_frm_field:not(:first)").prop("disabled", false); $(".form_field_outer").find(".remove_node_btn_frm_field").first().prop("disabled", true); }); });


@endsection