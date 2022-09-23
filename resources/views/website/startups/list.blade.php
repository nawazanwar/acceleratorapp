{{--<div class="card px-5 py-3  rounded-3">
       <div>
           <img class="card-img-top circle mb-2" src="{{ asset($record->logo[0]->filename??'uploads/default_startup.png') }}"
                alt=" @if($startup_for==\App\Enum\StartUpForEnum::BA AND $startup_type==\App\Enum\StartUpTypeEnum::INDIVIDUAL)
               {{ $record->user->getFullName() }}
           @elseif($startup_for==\App\Enum\StartUpForEnum::FREELANCER AND $startup_type==\App\Enum\StartUpTypeEnum::INDIVIDUAL)
               {{ $record->user->getFullName() }}
           @elseif($startup_for==\App\Enum\StartUpForEnum::BA AND $startup_type==\App\Enum\StartUpTypeEnum::COMPANY)
               {{ $record->company_name }}
           @elseif($startup_for==\App\Enum\StartUpForEnum::FREELANCER AND $startup_type==\App\Enum\StartUpTypeEnum::COMPANY)
               {{ $record->company_name }}
           @elseif($startup_for==\App\Enum\StartUpForEnum::MENTOR)
               {{ $record->user->getFullName() }}
           @endif">
       </div>
       <div class="card-title">
           <h6 class="card-title text-center title-card">
               @if($startup_for==\App\Enum\StartUpForEnum::BA AND $startup_type==\App\Enum\StartUpTypeEnum::INDIVIDUAL)
                   {{ $record->user->getFullName() }}
               @elseif($startup_for==\App\Enum\StartUpForEnum::FREELANCER AND $startup_type==\App\Enum\StartUpTypeEnum::INDIVIDUAL)
                   {{ $record->user->getFullName() }}
               @elseif($startup_for==\App\Enum\StartUpForEnum::BA AND $startup_type==\App\Enum\StartUpTypeEnum::COMPANY)
                   {{ $record->company_name }}
               @elseif($startup_for==\App\Enum\StartUpForEnum::FREELANCER AND $startup_type==\App\Enum\StartUpTypeEnum::COMPANY)
                   {{ $record->company_name }}
               @elseif($startup_for==\App\Enum\StartUpForEnum::MENTOR)
                   {{ $record->user->getFullName() }}
               @endif
           </h6>
       </div>
       <div class="card-body bg-transparent px-0 py-0 text-center">
           <ul class="ba-company-ul">
               @foreach($record->user->subscription->package->services as $service)
                   @if($loop->index<3)
                       @if($service->slug=='incubator')
                           @if($service->pivot->building_limit>0)
                               <li class="true">
                                   <svg class="svg-adjust" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        fill="#01023B">
                                       <path
                                           d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                                   </svg>
                                   {{ trans('general.buildings') }}
                               </li>
                           @else
                               <li class="false">
                                   <svg class="svg-adjust" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        fill="#F684B2">
                                       <path
                                           d="M175 175C184.4 165.7 199.6 165.7 208.1 175L255.1 222.1L303 175C312.4 165.7 327.6 165.7 336.1 175C346.3 184.4 346.3 199.6 336.1 208.1L289.9 255.1L336.1 303C346.3 312.4 346.3 327.6 336.1 336.1C327.6 346.3 312.4 346.3 303 336.1L255.1 289.9L208.1 336.1C199.6 346.3 184.4 346.3 175 336.1C165.7 327.6 165.7 312.4 175 303L222.1 255.1L175 208.1C165.7 199.6 165.7 184.4 175 175V175zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                                   </svg>
                                   {{ trans('general.buildings') }}
                               </li>
                           @endif
                           @if($service->pivot->floor_limit>0)
                               <li class="true">
                                   <svg class="svg-adjust" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        fill="#01023B">
                                       <path
                                           d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                                   </svg>
                                   {{ trans('general.floors') }}
                               </li>
                           @else
                               <li class="false">
                                   <svg class="svg-adjust" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        fill="#F684B2">
                                       <path
                                           d="M175 175C184.4 165.7 199.6 165.7 208.1 175L255.1 222.1L303 175C312.4 165.7 327.6 165.7 336.1 175C346.3 184.4 346.3 199.6 336.1 208.1L289.9 255.1L336.1 303C346.3 312.4 346.3 327.6 336.1 336.1C327.6 346.3 312.4 346.3 303 336.1L255.1 289.9L208.1 336.1C199.6 346.3 184.4 346.3 175 336.1C165.7 327.6 165.7 312.4 175 303L222.1 255.1L175 208.1C165.7 199.6 165.7 184.4 175 175V175zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                                   </svg>
                                   {{ trans('general.offices') }}
                               </li>
                           @endif
                           @if($service->pivot->office_limit>0)
                               <li class="true">
                                   <svg class="svg-adjust" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        fill="#01023B">
                                       <path
                                           d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                                   </svg>
                                   {{ trans('general.offices') }}
                               </li>
                           @else
                               <li class="false">
                                   <svg class="svg-adjust" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        fill="#F684B2">
                                       <path
                                           d="M175 175C184.4 165.7 199.6 165.7 208.1 175L255.1 222.1L303 175C312.4 165.7 327.6 165.7 336.1 175C346.3 184.4 346.3 199.6 336.1 208.1L289.9 255.1L336.1 303C346.3 312.4 346.3 327.6 336.1 336.1C327.6 346.3 312.4 346.3 303 336.1L255.1 289.9L208.1 336.1C199.6 346.3 184.4 346.3 175 336.1C165.7 327.6 165.7 312.4 175 303L222.1 255.1L175 208.1C165.7 199.6 165.7 184.4 175 175V175zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                                   </svg>
                                   {{ trans('general.offices') }}
                               </li>
                           @endif
                       @else
                           <li class="  @if($service->pivot->limit>0) true @else false @endif">
                               @if($service->pivot->limit>0)
                                   <svg class="svg-adjust" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        fill="#01023B">
                                       <path
                                           d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                                   </svg>
                               @else
                                   <svg class="svg-adjust" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        fill="#F684B2">
                                       <path
                                           d="M175 175C184.4 165.7 199.6 165.7 208.1 175L255.1 222.1L303 175C312.4 165.7 327.6 165.7 336.1 175C346.3 184.4 346.3 199.6 336.1 208.1L289.9 255.1L336.1 303C346.3 312.4 346.3 327.6 336.1 336.1C327.6 346.3 312.4 346.3 303 336.1L255.1 289.9L208.1 336.1C199.6 346.3 184.4 346.3 175 336.1C165.7 327.6 165.7 312.4 175 303L222.1 255.1L175 208.1C165.7 199.6 165.7 184.4 175 175V175zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"></path>
                                   </svg>
                               @endif
                               {{ $service->name }}
                           </li>
                       @endif
                   @endif
               @endforeach
           </ul>
           @if($startup_for !==\App\Enum\StartUpForEnum::MENTOR)
               <a class="read-more btn px-3 py-2 mt-3 rounded-2"
                  href="{{ route('website.startups.services.index',[$startup_for,$startup_type,$record->user->id]) }}">
                   View Services
               </a>
           @else
               <a class="read-more btn px-3 py-2 mt-3 rounded-2"
                  href="{{ route('website.startups.services.index',[$startup_for,'individual',$record->user->id]) }}">
                   View Services
               </a>
           @endif
       </div>
   </div>--}}

<div class="card mt-3 shadow rounded-3" style="5px 5px 5px 5px rgb(210 209 209 / 75%)">
    <div class="card-body">
        <div class="col-md-12 text-center">
            <img style="width: 100%; max-width: 200px"
                 src="{{ asset($record->logo[0]->filename??'uploads/default_startup.png') }}"
                 alt=" @if($startup_for==\App\Enum\StartUpForEnum::BA AND $startup_type==\App\Enum\StartUpTypeEnum::INDIVIDUAL)
               {{ $record->user->getFullName() }}
           @elseif($startup_for==\App\Enum\StartUpForEnum::FREELANCER AND $startup_type==\App\Enum\StartUpTypeEnum::INDIVIDUAL)
               {{ $record->user->getFullName() }}
           @elseif($startup_for==\App\Enum\StartUpForEnum::BA AND $startup_type==\App\Enum\StartUpTypeEnum::COMPANY)
               {{ $record->company_name }}
           @elseif($startup_for==\App\Enum\StartUpForEnum::FREELANCER AND $startup_type==\App\Enum\StartUpTypeEnum::COMPANY)
               {{ $record->company_name }}
           @elseif($startup_for==\App\Enum\StartUpForEnum::MENTOR)
               {{ $record->user->getFullName() }}
           @endif">
            <hr>
        </div>
        <div class="col-md-12">
            <h3 class="text-center fw-bold text-uppercase">
                @if($startup_for==\App\Enum\StartUpForEnum::BA AND $startup_type==\App\Enum\StartUpTypeEnum::INDIVIDUAL)
                    {{ $record->user->getFullName() }}
                @elseif($startup_for==\App\Enum\StartUpForEnum::FREELANCER AND $startup_type==\App\Enum\StartUpTypeEnum::INDIVIDUAL)
                    {{ $record->user->getFullName() }}
                @elseif($startup_for==\App\Enum\StartUpForEnum::BA AND $startup_type==\App\Enum\StartUpTypeEnum::COMPANY)
                    {{ $record->company_name }}
                @elseif($startup_for==\App\Enum\StartUpForEnum::FREELANCER AND $startup_type==\App\Enum\StartUpTypeEnum::COMPANY)
                    {{ $record->company_name }}
                @elseif($startup_for==\App\Enum\StartUpForEnum::MENTOR)
                    {{ $record->user->getFullName() }}
                @endif
            </h3>
            <p class="text-center pt-2">
                We develop and implement a systemic approach to outsmart your competition and employ a multifaceted
                strategy.</p>
            <div class="text-center">
                @if($startup_for !==\App\Enum\StartUpForEnum::MENTOR)
                    <a class="read-more btn px-3 py-2 mt-3 rounded-2"
                       href="{{ route('website.startups.services.index',[$startup_for,$startup_type,$record->user->id]) }}">
                        View Services
                    </a>
                @else
                    <a class="read-more btn px-3 py-2 mt-3 rounded-2"
                       href="{{ route('website.startups.services.index',[$startup_for,'individual',$record->user->id]) }}">
                        View Services
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-sm-12 col-sm-4 col-xs-12 align-self-center text-center">
                <div class="footer-buttons mt-3 pb-1">
                    <a class="btn btn-primary btn-xs btn-circle mx-2" style="background-color: #01023B!important;">
                        <i class="bx bxl-linkedin"></i>
                    </a>
                    <a class="btn btn-success btn-xs btn-circle mx-2" style="background-color: #01023B !important">
                        <i class="bx bxl-instagram"></i>
                    </a>
                    <a class="btn btn-primary btn-xs btn-circle mx-2" style="background-color: #01023B!important;">
                        <i class="bx bxl-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
