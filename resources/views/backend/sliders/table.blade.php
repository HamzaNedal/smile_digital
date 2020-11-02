
<div class="table-responsive">

    <div class="card">
        <div class="card-header ">
          <h3 class="card-title float-left ">
            <x-backend.button route='slider' add='اضافة سلايدر' />      
          </h3>
          <p style="color:black ; margin-top:10px"> (يتم عرض البيانات باللغة العربية ويمكن تعديل البيانات للغات كافة) </p>   

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="form" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="form-users">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الوصف</th>
                        <th>الرابط</th>
                        {{-- <th>الصورة</th> --}}
                        <th>الصورة كخلفية</th>
                        <th>تاريخ الإنشاء</th>
                        <th>الحدث</th>
                    </tr>
                </thead>
             
            </table>
        </div>
        <!-- /.card-body -->
      </div>


</div>
