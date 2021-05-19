<div class=" flex flex-col sm:justify-center items-center sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full bg-gray-100 sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg" style="z-index:10">
        {{ $slot }}
    </div>
    
    <div>
   
        <link rel="stylesheet" type="text/css" href="{{ url('/css/car.css') }}" /> 
            <div class="car">
                <div class="body">
                    <div class="mirror-wrap">
                        <div class="mirror-inner">
                            <div class="mirror">
                                <div class="shine"></div>
                            </div>
                        </div>
                    </div>
                    <div class="middle">
                        <div class="top">
                            <div class="line"></div>
                        </div>
                        <div class="bottom">
                            <div class="lights">
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bumper">
                        <div class="top"></div>
                        <div class="middle" data-numb="&#2348;&#2366; &#2415;&#2411; &#2330; &#2415;&#2411;&#2415;&#2411;"></div>
                        <div class="bottom"></div>
                    </div>
                </div>
                <div class="tyres">
                    <div class="tyre back"></div>
                    <div class="tyre front"></div>
                </div>
            </div>
            <div class="road-wrap">
                <div class="road">
                    <div class="lane-wrap">
                        <div class="lane">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>
