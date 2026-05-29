@extends('layouts.app')
@section('content')

      <!-- aq error area start -->
      <div class="aq-error-area pt-130 pb-120">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="aq-error-wrapper text-center">
                     <h4 class="aq-error-title">{{ t('error.oops') }}</h4>
                     <div class="aq-error-thumb mb-55">
                        <img  src="{{ asset('assets/img/others/error.webp') }}" alt="">
                     </div>
                     <div class="aq-error-content">
                        <h4 class="aq-error-title-sm">{{ t('error.title') }}</h4>
                        <p>{{ t('error.subtitle') }}</p>
                        <a class="aq-btn-black" href="{{ route('home') }}">{{ t('error.back_home') }}</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- aq error area end -->

@endsection
