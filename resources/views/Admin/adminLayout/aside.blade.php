 <!-- Sidebar Navigation Left -->
 <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
   <!-- Logo -->
   <div class="logo-sn >
      <a class=" pl-0 ml-0 text-center" href="{{ route('admin') }}"> <img src="{{ asset('adminasset/img/cairo-chamber-logo-footer.png')}}" style="height:200px;margin-right: 40px;" alt="logo">
     </a>
   </div>
   <!-- main left  -->
   <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
     <!-- Home -->
     <li class="menu-item ">
       <a class="active" href="{{ route('admin') }}">
         <span><i class="material-icons fs-16">home</i>الرئيسية </span>
       </a>
     </li>
     <!-- /Home -->
     <!-- Setup  -->
     <li class="menu-item">
       <a href="#" class="has-chevron" data-toggle="collapse" data-target="#create" aria-expanded="true" aria-controls="tables">
         <span><i class="material-icons fs-16">build</i>Setup</span>
       </a>
       <ul id="create" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">
         <li> <a href="{{ route('slider.index') }}">سلايدر الرئيسية</a> </li>
         <li> <a href="{{ route('articel.index') }}">صفحات الغرفة</a> </li>
         <li> <a href="{{ route('board.index') }}">إدارة الغرفة</a> </li>
         <li> <a href="{{ route('socialResponsibility.index') }}">المسئولية الإجتماعية</a> </li>
         <li> <a href="{{ route('section.index') }}">الإدارات</a> </li>
         <li> <a href="{{ route('social.index') }}">التواصل الإجتماعى</a> </li>
         <li> <a href="{{ route('contactMsg.index') }}">رسائل العملاء</a> </li>
         <li> <a href="{{ route('newsletter.index') }}">القائمة البريدية</a> </li>
         <li> <a href="{{ route('adsImage.index') }}">إعلانات بالصور</a> </li>
         <li> <a href="{{ route('adsVedio.index') }}">إعلانات بالفيديو</a> </li>
       </ul>
     </li>
     <!--  Setup  -->
     <li class="menu-item">
       <a href="#" class="has-chevron" data-toggle="collapse" data-target="#basic-elements" aria-expanded="false" aria-controls="basic-elements">
         <span><i class="material-icons fs-16">build</i>المركز الإعلامى</span>
       </a>
       <ul id="basic-elements" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">
         <li> <a href="{{ route('news.index') }}">الأخبار</a> </li>
         <li> <a href="{{ route('album.index') }}">جاليرى الغرفة</a> </li>
         <li> <a href="{{ route('announce.index') }}">التنويهات</a> </li>

       </ul>
     </li>
     <!--  devisions  -->
     <li class="menu-item">
       <a href="#" class="has-chevron" data-toggle="collapse" data-target="#basic-devisions" aria-expanded="false" aria-controls="basic-devisions">
         <span><i class="material-icons fs-16">build</i>شعب الغرفة</span>
       </a>
       <ul id="basic-devisions" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">
         <li> <a href="{{ route('devisions.index') }}">بيانات الشعب</a> </li>
         <li> <a href="{{ route('devMeeting.index') }}">إجتماعات الشعب</a> </li>
         <li> <a href="{{ route('devNews.index') }}">أخبار الشعب</a> </li>
         <li> <a href="{{ route('devBoard.index') }}">إدارة الشعب</a> </li>
         <li> <a href="{{ route('registerDev.index') }}">تسجيل الشعب</a> </li>

       </ul>
     </li>
     <!-- Chamber pages   -->
     <li class="menu-item">
       <a href="#" class="has-chevron" data-toggle="collapse" data-target="#Usersdropdown" aria-expanded="false" aria-controls="contactsdropdown">
         <span><i class="material-icons fs-16">build</i>صفحات الغرفة</span>
       </a>
       <ul id="Usersdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
       <li> <a href="{{ route('country-details.index') }}">بيانات الدول </a> </li>
         <li> <a href="{{ route('adminChance.index') }}">الفرص التجارية</a> </li>
         <li> <a href="{{ route('conference.index') }}">المؤتمرات</a> </li>
         <li> <a href="{{ route('activity.index') }}">أنشطة المرأة</a> </li>



       </ul>
     </li>
     <!-- end -->
     <!-- academy   -->
     <li class="menu-item">
       <a href="#" class="has-chevron" data-toggle="collapse" data-target="#contactsdropdown" aria-expanded="false" aria-controls="contactsdropdown">
         <span><i class="material-icons fs-16">build</i>الأكاديمية</span>
       </a>
       <ul id="contactsdropdown" class="collapse active" aria-labelledby="tables" data-parent="#side-nav-accordion">
         <li> <a href="{{ route('number.index') }}">الأكاديمية بالأرقام</a> </li>
         <li> <a href="{{ route('academyGallery.index') }}">الجاليرى</a> </li>
         <li> <a href="{{ route('partener.index') }}">الشركاء</a> </li>
         <li> <a href="{{ route('client.index') }}">الرعاة</a> </li>
         <li> <a href="{{ route('academyData.index') }}">بيانات التواصل</a> </li>
         <li> <a href="{{ route('academyCompany.index') }}"> شركات تم تدريبها</a> </li>
         <li> <a href="{{ route('academyCourses.index') }}"> كورسات الاكاديمية</a> </li>

         <li> <a href="{{ route('aboutAcademy.index') }}">عن الأكاديمية </a> </li>

       </ul>
     </li>
     <!-- Encyclo  -->
     <li class="menu-item">
       <a href="#" class="has-chevron" data-toggle="collapse" data-target="#callsdropdown" aria-expanded="false" aria-controls="callsdropdown">
         <span><i class="material-icons fs-16">call</i>أدلة هامة</span>
       </a>
       <ul id="callsdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
         <li> <a href="{{ route('brother.index') }}">إتفاقات التآخى</a> </li>
         <li> <a href="{{ route('commercialAgreement.index') }}">الإتفاقيات التجارية</a> </li>
         <li> <a href="{{ route('business-organizations.index') }}">منظمات الأعمال</a> </li>
         <li> <a href="{{ route('study-report.index') }}">دراسات / تقارير</a> </li>
         <li> <a href="{{ route('embassies.index') }}">السفارات / القنصليات</a> </li>
         <li> <a href="{{ route('decisions-laws.index') }}">قرارات / قوانين</a> </li>
         <li> <a href="{{ route('ministries.index') }}">وزارات</a> </li>
         <li> <a href="{{ route('communications-guide.index') }}">أدلة الإتصالات</a> </li>
         <li> <a href="{{ route('commmercial-topics.index') }}">مواضيع تجارية</a> </li>
         <li> <a href="{{ route('exporters-encyclopedia.index') }}">موسوعة المصدرين</a> </li>
         <li> <a href="{{ route('countries-data.index') }}">بيانات الدول</a> </li>






       </ul>
     </li>
     <!-- / Encyclo  -->
     
   </ul>
  
  </aside>