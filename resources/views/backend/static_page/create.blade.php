@extends('backend.layouts.app')
@section('title', 'الاعدادات')

@section('content')
@push('css')
    <style>
fieldset
{
    border: solid 1px #000;
    padding:10px;
    display:block;
    clear:both;
    margin:5px 0px;
}
legend
{
    padding:0px 10px;
    background:black;
    color:#FFF;
}
input.add
{
    float:right;
}
input.fieldname
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
}
select.fieldtype
{
    float:left;
    display:block;
    margin:5px;
}
input.remove
{
    float:left;
    display:block;
    margin:5px;
}
#yourform label
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
}
#yourform input, #yourform textarea
{
    float:left;
    display:block;
    margin:5px;
}
     .iconEdit{
        position: absolute;
    top: 0;
    left: 517px;
     }   
     label{
        text-transform: capitalize;

     }
    </style>
@endpush
    <div class="content">
        <x-backend.message />     
        <x-backend.errors />     
      <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="margin-left: 0;
                margin-right: 0;">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary mt-2 mr-2">
                          <div class="card-header ">
                            <h3 class="card-title float-left">الاعدادت الاساسية</h3>
                          </div>
                          <form action="{{ route('admin.static_page.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                @include('backend.static_page.fields')
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                          </form>
                         </div>
                    </div>
                         <div class="col-md-6">
                         <div class="card card-primary mt-2 mr-2">
                            
                            <div class="card-header ">
                              <h3 class="card-title float-left">عن الشركة</h3>
                            </div>
                            <form action="{{ route('admin.about_company.store') }}" method="post" enctype="multipart/form-data">
                              @csrf
                                  @include('backend.static_page.fields_one')
                              <div class="card-footer">
                                  <button type="submit" class="btn btn-primary">حفظ</button>
                              </div>
                            </form>
                           </div>
                         </div>
                         <div class="col-md-6">
                            <div class="card card-primary mt-2 mr-2">
                               
                               <div class="card-header ">
                                 <h3 class="card-title float-left">الطلب</h3>
                               </div>
                               <form action="{{ route('admin.order.store') }}" method="post" enctype="multipart/form-data">
                                 @csrf
                                     @include('backend.static_page.fields_two')
                                 <div class="card-footer">
                                     <button type="submit" class="btn btn-primary">حفظ</button>
                                 </div>
                               </form>
                              </div>
                            </div>
                     </div>
            </div>
        </div>
    </div>
    @push('js')
    <script src="{{ asset('backend') }}/dist/css/jq.multiinput.min.css"></script>
    <script src="{{ asset('backend') }}/dist/js/jq.multiinput.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/select2/js/select2.full.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-yaml/3.14.0/js-yaml.min.js" integrity="sha512-ia9gcZkLHA+lkNST5XlseHz/No5++YBneMsDp1IZRJSbi1YqQvBeskJuG1kR+PH1w7E0bFgEZegcj0EwpXQnww==" crossorigin="anonymous"></script>
        <script>


$(document).ready(function() {
	// var max_fields      = 10; //maximum input boxes allowed
	// var wrapper   		= $("#form-static"); //Fields wrapper
	// var add_button      = $(".add_field_button"); //Add button ID
	
	// var x = 1; //initlal text box count
    // var y = 0;
	// $(add_button).click(function(e){ //on add input button click
	// 	e.preventDefault();
	// 	if(x < max_fields){ //max input box allowed
	// 		x++; //text box increment
	// 		$(wrapper).append(`
    //         <div class="col-md-6">
    //             <div class="form-group">
    //             <input type='text' placeholder='enter name' name='newInfo[${y}][name]'>
    //             <textarea class="form-control" name="newInfo[${y}][value]"></textarea>
    //             <div class="form-check">
    //                 <input class="form-check-input"  type="checkbox" value="0" name="newInfo[${y}][status]">
    //                 <label class="form-check-label">Status</label>
    //              <div class="iconEdit">
    //                 <a href="#" class="iconClick"><i class="fa fa-paperclip"></i></a>
    //                 <input class="form-input d-none icon" id="" type="file"  name="newInfo[${y}][file]">
    //                 <label class="form-check-label" for="">add icon</label>
    //              </div>
    //                 <a href="#" class="remove_field">Remove</a></div>
    //             </div>
    //             </div> 
    //             </div>
    //         `); //add input box
    //         y++;
	// 	}
	// });
        
    //     $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    //         e.preventDefault(); $(this).parent('div').parent('div').parent('div').remove(); x--;
    //     })
    // });
    //         $(document).on('change','input[type=checkbox]',function(){
    //             if($(this).val() == 0){
    //                 $(this).val(1) ;
    //             }else{
    //                 $(this).val(0)
    //             }
    //         });

    //         $(document).on('click',".iconClick",function(e){
    //             e.preventDefault();
    //             console.log('data');
    //             $(this).siblings('.icon').click();


            })


        </script>
    @endpush
@endsection
