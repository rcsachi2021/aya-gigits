<div class="header-container">
                <div class="line"></div>
                
               
                <!-- ************** Start MAIN Menu **************************************** -->
                <ul class="nav">
                    <li><a href="{{Route('home')}}"><span>Home</span></a></li>
                    <li><a href="{{Route('portfolio')}}"><span>Portfolios</span></a></li>
                    <li><a href="{{Route('vera')}}"><span>Vera+</span></a></li>
                    <li><a href="{{Route('affiliate')}}"><span>Affiliate</span></a></li>
                    <li class="last"><a href="{{Route('contact')}}"><span>Contact</span></a></li>
                </ul>
                <!-- ************** End MAIN Menu ****************************************** -->
                <a class="logo" href="/">
                    <img src="assets/images/logo.jpg" alt="">
                </a>
                <div class="toolbar">
                   @auth
                    <a href="{{Route('logout')}}" title="Login">
                        Logout
                    </a>  
                    @endauth                           
                    @guest
                    <a href="{{Route('login')}}" title="Login">
                        Login
                    </a>
                    @endguest
                    
                    
                </div>
                
            </div>
            <div id="google_translate_element"></div>