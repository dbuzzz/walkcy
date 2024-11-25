@extends('frontend.layout')
@section('extern-css')
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 
@endsection
@section('content')

<section class="teacher__area pt-120 pb-110">
            <div class="page__title-shape">
               <img class="page-title-shape-5 d-none d-sm-block" src="assets/img/page-title/page-title-shape-1.html" alt="">
               <img class="page-title-shape-6" src="assets/img/page-title/page-title-shape-6.html" alt="">
               <img class="page-title-shape-3" src="assets/img/page-title/page-title-shape-3.html" alt="">
               <img class="page-title-shape-7" src="assets/img/page-title/page-title-shape-4.html" alt="">
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                     <div class="teacher__details-thumb p-relative pr-30">
                        <img class="team-thumb" src="assets/img/team/details/teacer-details-1.jpg" alt="">
                        <div class="teacher__details-shape">
                           <img class="teacher-details-shape-1" src="assets/img/team/details/shape/shape-1.png" alt="">
                           <img class="teacher-details-shape-2" src="assets/img/team/details/shape/shape-2.png" alt="">
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-8 col-xl-8 col-lg-8">
                     <div class="teacher__wrapper">
                        <div class="teacher__top d-md-flex align-items-end justify-content-between">
                           <div class="teacher__info">
                              <h4>Hilary Ouse</h4>
                              <span>Teaches Interior Markater</span>
                           </div>
                           <div class="teacher__rating">
                              <h5>Review:</h5>
                              <div class="teacher__rating-inner d-flex align-items-center">
                                 <ul>
                                    <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa-solid fa-star"></i></a></li>
                                 </ul>
                                 <p>4.5</p>
                              </div>
                           </div>
                           <div class="teacher__social-2">
                              <h4>Follow Us:</h4>
                              <ul>
                                 <li>
                                    <a href="#">
                                       <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#">
                                       <i class="fa-brands fa-twitter"></i>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#">
                                       <i class="fa-brands fa-vimeo-v"></i>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#">
                                       <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                           <div class="teacher__follow mb-5">
                              <a href="#" class="teacher__follow-btn">follow <i class="fa-solid fa-plus"></i></a>
                           </div>
                        </div>
                        <div class="teacher__bio">
                           <h3>Short Bio</h3>
                           <p>Only a quid me old mucker squiffy tomfoolery grub cheers ruddy cor blimey guvnor in my flat, up the duff Eaton car boot up the kyver pardon you A bit of how's your father David skive off sloshed, don't get shirty with me chip shop vagabond crikey bugger Queen's English chap. Matie boy nancy boy bite your arm off up the kyver old no biggie fantastic boot, David have it show off show off pick your nose and blow off lost the plot porkies bits and bobs only a quid bugger all mate, absolutely bladdered bamboozled it's your round don't get shirty with me down the pub well.</p>
                        </div>
                        <div class="teacher__courses pt-55">
                           <div class="section__title-wrapper mb-30">
                              <h2 class="section__title">Teacher <span class="yellow-bg yellow-bg-big">Course<img src="assets/img/shape/yellow-bg.html" alt=""></span></h2>
                           </div>
                           <div class="teacher__course-wrapper">
                              <div class="row">
                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="course__item-2 transition-3 white-bg mb-30 fix">
                                       <div class="course__thumb-2 w-img fix">
                                          <a href="course-details.html">
                                             <img src="assets/img/course/2/course-1.jpg" alt="">
                                          </a>
                                       </div>
                                       <div class="course__content-2">
                                          <div class="course__top-2 d-flex align-items-center justify-content-between">
                                             <div class="course__tag-2">
                                                <a href="#">Design Thinking</a>
                                             </div>
                                             <div class="course__price-2">
                                                <span>$136</span>
                                             </div>
                                          </div>
                                          <h3 class="course__title-2">
                                             <a href="course-details.html">Mechanical Engineering and Electrical Engineering Explained.</a>
                                          </h3>
                                          <div class="course__bottom-2 d-flex align-items-center justify-content-between">
                                             <div class="course__action">
                                                <ul>
                                                   <li>
                                                      <div class="course__action-item d-flex align-items-center">
                                                         <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M5.00004 5.5833C6.28592 5.5833 7.32833 4.5573 7.32833 3.29165C7.32833 2.02601 6.28592 1 5.00004 1C3.71416 1 2.67175 2.02601 2.67175 3.29165C2.67175 4.5573 3.71416 5.5833 5.00004 5.5833Z" stroke="#5F6160" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                  <path d="M9 11.0001C9 9.22632 7.20722 7.79175 5 7.79175C2.79278 7.79175 1 9.22632 1 11.0001" stroke="#5F6160" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                         </div>
                                                         <div class="course__action-content">
                                                            <span>4.2k</span>
                                                         </div>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="course__action-item d-flex align-items-center">
                                                         <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M9.01232 5.95416C9.01232 7.06709 8.11298 7.96642 7.00006 7.96642C5.88713 7.96642 4.98779 7.06709 4.98779 5.95416C4.98779 4.84123 5.88713 3.94189 7.00006 3.94189C8.11298 3.94189 9.01232 4.84123 9.01232 5.95416Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                                  <path d="M7 10.6026C8.98416 10.6026 10.8334 9.43342 12.1206 7.40991C12.6265 6.61737 12.6265 5.28523 12.1206 4.49269C10.8334 2.46919 8.98416 1.30005 7 1.30005C5.01584 1.30005 3.16658 2.46919 1.87941 4.49269C1.37353 5.28523 1.37353 6.61737 1.87941 7.40991C3.16658 9.43342 5.01584 10.6026 7 10.6026Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                         </div>
                                                         <div class="course__action-content">
                                                            <span>44k</span>
                                                         </div>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="course__action-item d-flex align-items-center">
                                                         <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M6.86447 1.72209L7.74447 3.49644C7.86447 3.74343 8.18447 3.98035 8.45447 4.02572L10.0495 4.29288C11.0695 4.46426 11.3095 5.2103 10.5745 5.94625L9.33447 7.19636C9.12447 7.40807 9.00947 7.81637 9.07447 8.10873L9.42947 9.65625C9.70947 10.8812 9.06447 11.355 7.98947 10.7148L6.49447 9.82259C6.22447 9.66129 5.77947 9.66129 5.50447 9.82259L4.00947 10.7148C2.93947 11.355 2.28947 10.8761 2.56947 9.65625L2.92447 8.10873C2.98947 7.81637 2.87447 7.40807 2.66447 7.19636L1.42447 5.94625C0.694466 5.2103 0.929466 4.46426 1.94947 4.29288L3.54447 4.02572C3.80947 3.98035 4.12947 3.74343 4.24947 3.49644L5.12947 1.72209C5.60947 0.759304 6.38947 0.759304 6.86447 1.72209Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                         </div>
                                                         <div class="course__action-content">
                                                            <span>5.0</span>
                                                         </div>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </div>
                                             <div class="course__tutor-2">
                                                <a href="#">
                                                   <img src="assets/img/course/tutor/course-tutor-1.jpg" alt="">
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="course__item-2 transition-3 white-bg mb-30 fix">
                                       <div class="course__thumb-2 w-img fix">
                                          <a href="course-details.html">
                                             <img src="assets/img/course/2/course-2.jpg" alt="">
                                          </a>
                                       </div>
                                       <div class="course__content-2">
                                          <div class="course__top-2 d-flex align-items-center justify-content-between">
                                             <div class="course__tag-2 pink-bg">
                                                <a href="#">Mechanical</a>
                                             </div>
                                             <div class="course__price-2">
                                                <span>$210</span>
                                             </div>
                                          </div>
                                          <h3 class="course__title-2">
                                             <a href="course-details.html">The Challenge Of Global Learning In Public Education.</a>
                                          </h3>
                                          <div class="course__bottom-2 d-flex align-items-center justify-content-between">
                                             <div class="course__action">
                                                <ul>
                                                   <li>
                                                      <div class="course__action-item d-flex align-items-center">
                                                         <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M5.00004 5.5833C6.28592 5.5833 7.32833 4.5573 7.32833 3.29165C7.32833 2.02601 6.28592 1 5.00004 1C3.71416 1 2.67175 2.02601 2.67175 3.29165C2.67175 4.5573 3.71416 5.5833 5.00004 5.5833Z" stroke="#5F6160" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                  <path d="M9 11.0001C9 9.22632 7.20722 7.79175 5 7.79175C2.79278 7.79175 1 9.22632 1 11.0001" stroke="#5F6160" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                         </div>
                                                         <div class="course__action-content">
                                                            <span>3.3k</span>
                                                         </div>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="course__action-item d-flex align-items-center">
                                                         <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M9.01232 5.95416C9.01232 7.06709 8.11298 7.96642 7.00006 7.96642C5.88713 7.96642 4.98779 7.06709 4.98779 5.95416C4.98779 4.84123 5.88713 3.94189 7.00006 3.94189C8.11298 3.94189 9.01232 4.84123 9.01232 5.95416Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                                  <path d="M7 10.6026C8.98416 10.6026 10.8334 9.43342 12.1206 7.40991C12.6265 6.61737 12.6265 5.28523 12.1206 4.49269C10.8334 2.46919 8.98416 1.30005 7 1.30005C5.01584 1.30005 3.16658 2.46919 1.87941 4.49269C1.37353 5.28523 1.37353 6.61737 1.87941 7.40991C3.16658 9.43342 5.01584 10.6026 7 10.6026Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                         </div>
                                                         <div class="course__action-content">
                                                            <span>56k</span>
                                                         </div>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="course__action-item d-flex align-items-center">
                                                         <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M6.86447 1.72209L7.74447 3.49644C7.86447 3.74343 8.18447 3.98035 8.45447 4.02572L10.0495 4.29288C11.0695 4.46426 11.3095 5.2103 10.5745 5.94625L9.33447 7.19636C9.12447 7.40807 9.00947 7.81637 9.07447 8.10873L9.42947 9.65625C9.70947 10.8812 9.06447 11.355 7.98947 10.7148L6.49447 9.82259C6.22447 9.66129 5.77947 9.66129 5.50447 9.82259L4.00947 10.7148C2.93947 11.355 2.28947 10.8761 2.56947 9.65625L2.92447 8.10873C2.98947 7.81637 2.87447 7.40807 2.66447 7.19636L1.42447 5.94625C0.694466 5.2103 0.929466 4.46426 1.94947 4.29288L3.54447 4.02572C3.80947 3.98035 4.12947 3.74343 4.24947 3.49644L5.12947 1.72209C5.60947 0.759304 6.38947 0.759304 6.86447 1.72209Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                         </div>
                                                         <div class="course__action-content">
                                                            <span>4.5</span>
                                                         </div>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </div>
                                             <div class="course__tutor-2">
                                                <a href="#">
                                                   <img src="assets/img/course/tutor/course-tutor-2.jpg" alt="">
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="course__item-2 transition-3 white-bg mb-30 fix">
                                       <div class="course__thumb-2 w-img fix">
                                          <a href="course-details.html">
                                             <img src="assets/img/course/2/course-3.jpg" alt="">
                                          </a>
                                       </div>
                                       <div class="course__content-2">
                                          <div class="course__top-2 d-flex align-items-center justify-content-between">
                                             <div class="course__tag-2 violet-bg">
                                                <a href="#">Design Thinking</a>
                                             </div>
                                             <div class="course__price-2">
                                                <span>$136</span>
                                             </div>
                                          </div>
                                          <h3 class="course__title-2">
                                             <a href="course-details.html">Mechanical Engineering and Electrical Engineering Explained.</a>
                                          </h3>
                                          <div class="course__bottom-2 d-flex align-items-center justify-content-between">
                                             <div class="course__action">
                                                <ul>
                                                   <li>
                                                      <div class="course__action-item d-flex align-items-center">
                                                         <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M5.00004 5.5833C6.28592 5.5833 7.32833 4.5573 7.32833 3.29165C7.32833 2.02601 6.28592 1 5.00004 1C3.71416 1 2.67175 2.02601 2.67175 3.29165C2.67175 4.5573 3.71416 5.5833 5.00004 5.5833Z" stroke="#5F6160" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                  <path d="M9 11.0001C9 9.22632 7.20722 7.79175 5 7.79175C2.79278 7.79175 1 9.22632 1 11.0001" stroke="#5F6160" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                         </div>
                                                         <div class="course__action-content">
                                                            <span>3.7k</span>
                                                         </div>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="course__action-item d-flex align-items-center">
                                                         <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M9.01232 5.95416C9.01232 7.06709 8.11298 7.96642 7.00006 7.96642C5.88713 7.96642 4.98779 7.06709 4.98779 5.95416C4.98779 4.84123 5.88713 3.94189 7.00006 3.94189C8.11298 3.94189 9.01232 4.84123 9.01232 5.95416Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                                  <path d="M7 10.6026C8.98416 10.6026 10.8334 9.43342 12.1206 7.40991C12.6265 6.61737 12.6265 5.28523 12.1206 4.49269C10.8334 2.46919 8.98416 1.30005 7 1.30005C5.01584 1.30005 3.16658 2.46919 1.87941 4.49269C1.37353 5.28523 1.37353 6.61737 1.87941 7.40991C3.16658 9.43342 5.01584 10.6026 7 10.6026Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                         </div>
                                                         <div class="course__action-content">
                                                            <span>36k</span>
                                                         </div>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="course__action-item d-flex align-items-center">
                                                         <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M6.86447 1.72209L7.74447 3.49644C7.86447 3.74343 8.18447 3.98035 8.45447 4.02572L10.0495 4.29288C11.0695 4.46426 11.3095 5.2103 10.5745 5.94625L9.33447 7.19636C9.12447 7.40807 9.00947 7.81637 9.07447 8.10873L9.42947 9.65625C9.70947 10.8812 9.06447 11.355 7.98947 10.7148L6.49447 9.82259C6.22447 9.66129 5.77947 9.66129 5.50447 9.82259L4.00947 10.7148C2.93947 11.355 2.28947 10.8761 2.56947 9.65625L2.92447 8.10873C2.98947 7.81637 2.87447 7.40807 2.66447 7.19636L1.42447 5.94625C0.694466 5.2103 0.929466 4.46426 1.94947 4.29288L3.54447 4.02572C3.80947 3.98035 4.12947 3.74343 4.24947 3.49644L5.12947 1.72209C5.60947 0.759304 6.38947 0.759304 6.86447 1.72209Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                         </div>
                                                         <div class="course__action-content">
                                                            <span>2.5</span>
                                                         </div>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </div>
                                             <div class="course__tutor-2">
                                                <a href="#">
                                                   <img src="assets/img/course/tutor/course-tutor-3.jpg" alt="">
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                    <div class="course__item-2 transition-3 white-bg mb-30 fix">
                                       <div class="course__thumb-2 w-img fix">
                                          <a href="course-details.html">
                                             <img src="assets/img/course/2/course-4.jpg" alt="">
                                          </a>
                                       </div>
                                       <div class="course__content-2">
                                          <div class="course__top-2 d-flex align-items-center justify-content-between">
                                             <div class="course__tag-2 yellow-bg">
                                                <a href="#">Photography</a>
                                             </div>
                                             <div class="course__price-2">
                                                <span>$136</span>
                                             </div>
                                          </div>
                                          <h3 class="course__title-2">
                                             <a href="course-details.html">Statistics Data Scince and Business Analysis.</a>
                                          </h3>
                                          <div class="course__bottom-2 d-flex align-items-center justify-content-between">
                                             <div class="course__action">
                                                <ul>
                                                   <li>
                                                      <div class="course__action-item d-flex align-items-center">
                                                         <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M5.00004 5.5833C6.28592 5.5833 7.32833 4.5573 7.32833 3.29165C7.32833 2.02601 6.28592 1 5.00004 1C3.71416 1 2.67175 2.02601 2.67175 3.29165C2.67175 4.5573 3.71416 5.5833 5.00004 5.5833Z" stroke="#5F6160" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                  <path d="M9 11.0001C9 9.22632 7.20722 7.79175 5 7.79175C2.79278 7.79175 1 9.22632 1 11.0001" stroke="#5F6160" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                         </div>
                                                         <div class="course__action-content">
                                                            <span>2.3k</span>
                                                         </div>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="course__action-item d-flex align-items-center">
                                                         <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M9.01232 5.95416C9.01232 7.06709 8.11298 7.96642 7.00006 7.96642C5.88713 7.96642 4.98779 7.06709 4.98779 5.95416C4.98779 4.84123 5.88713 3.94189 7.00006 3.94189C8.11298 3.94189 9.01232 4.84123 9.01232 5.95416Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                                  <path d="M7 10.6026C8.98416 10.6026 10.8334 9.43342 12.1206 7.40991C12.6265 6.61737 12.6265 5.28523 12.1206 4.49269C10.8334 2.46919 8.98416 1.30005 7 1.30005C5.01584 1.30005 3.16658 2.46919 1.87941 4.49269C1.37353 5.28523 1.37353 6.61737 1.87941 7.40991C3.16658 9.43342 5.01584 10.6026 7 10.6026Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                         </div>
                                                         <div class="course__action-content">
                                                            <span>66k</span>
                                                         </div>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="course__action-item d-flex align-items-center">
                                                         <div class="course__action-icon mr-5">
                                                            <span>
                                                               <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M6.86447 1.72209L7.74447 3.49644C7.86447 3.74343 8.18447 3.98035 8.45447 4.02572L10.0495 4.29288C11.0695 4.46426 11.3095 5.2103 10.5745 5.94625L9.33447 7.19636C9.12447 7.40807 9.00947 7.81637 9.07447 8.10873L9.42947 9.65625C9.70947 10.8812 9.06447 11.355 7.98947 10.7148L6.49447 9.82259C6.22447 9.66129 5.77947 9.66129 5.50447 9.82259L4.00947 10.7148C2.93947 11.355 2.28947 10.8761 2.56947 9.65625L2.92447 8.10873C2.98947 7.81637 2.87447 7.40807 2.66447 7.19636L1.42447 5.94625C0.694466 5.2103 0.929466 4.46426 1.94947 4.29288L3.54447 4.02572C3.80947 3.98035 4.12947 3.74343 4.24947 3.49644L5.12947 1.72209C5.60947 0.759304 6.38947 0.759304 6.86447 1.72209Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                               </svg>
                                                            </span>
                                                         </div>
                                                         <div class="course__action-content">
                                                            <span>3.5</span>
                                                         </div>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </div>
                                             <div class="course__tutor-2">
                                                <a href="#">
                                                   <img src="assets/img/course/tutor/course-tutor-4.jpg" alt="">
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>


@endsection
@section('extern-js')

<script src="{{url('plugins\datatables\jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('frontend_assets/custom_js/cart.js')}}"></script>
@endsection