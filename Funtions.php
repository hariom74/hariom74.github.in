<script>
        function menu(){
            //if(document.getElementById('menu').style.left==0){
               // alert('-270');
                //document.getElementById('menu').style.display='initial';
                //document.getElementById('menu').style.left = -270;
                
           // }else{
               //document.getElementById('menu').style.display='none';
              //  document.getElementById('menu').style.left = 0;
                
                
               // alert('0');
            //}
            a=txtComments.menu;
            
            console.log(a);
        }

        function dashboard(){
            
                document.getElementById('board').style.display='initial';
                document.getElementById('values').style.display='flex';
                document.getElementById('product').style.display='none';
                document.getElementById('your_order').style.display='none';
                document.getElementById('dashboard').style.background='#eef0f3';
                document.getElementById('your-order').style.background='none';
                document.getElementById('upload_img').style.background='none';
                document.getElementById('i-name').innerHTML='Dashboard';
                document.getElementById('upload_btn').style.display='none';
                // document.getElementById('your_order').style.display='none';


        }

        function upload_img(){
            document.getElementById('board').style.display='none';
            document.getElementById('values').style.display='none';
            document.getElementById('your_order').style.display='none';
            document.getElementById('product').style.display='flex';
            document.getElementById('dashboard').style.background='none';
            document.getElementById('upload_img').style.background='#eef0f3';
            document.getElementById('your-order').style.background='none';
            document.getElementById('i-name').innerHTML='Upload Product';
            document.getElementById('upload_btn').style.display='initial';
            // // document.getElementById('your_order').style.display='none';



    }
    function your_order(){
            document.getElementById('your_order').style.display='flex';
            document.getElementById('board').style.display='none';
            document.getElementById('values').style.display='none';
            document.getElementById('product').style.display='none';
            document.getElementById('dashboard').style.background='none';
            document.getElementById('upload_img').style.background='none';
            document.getElementById('your-order').style.background='#eef0f3';
            // document.getElementById('i-name').innerHTML='Upload Product';
            document.getElementById('i-name').innerHTML='Your Order';
            document.getElementById('upload_btn').style.display='none';



    }

    function home(){
        window.location.href='index.php';
    }

    function popup(popup_name) {
            get_popup = document.getElementById(popup_name);
            if (get_popup.style.display == "flex") {
                get_popup.style.display = "none";
            } else {
                get_popup.style.display = "flex";
            }
            
        }

    function showSallerDetails(){
        if(document.getElementById('saller-info').style.display=='none'){
            document.getElementById('saller-info').style.display='initial';
        }else{
            document.getElementById('saller-info').style.display='none';
        }
    }

    function logLat(){
        
        var x = document.getElementById("location");
        getLogLet();
        function getLogLet(){
            if(navigator.geolocation){
                
                navigator.geolocation.getCurrentPosition(showExactPosition);
                
            }else{
                x.innerHTML="Geolocation is not supported";
            }
        }
        function showExactPosition(position){
            x.innerHTML ="Latitude: "+position.coords.latitude+"<br>Longitude: "+position.coords.longitude;
            var lat=position.coords.latitude;
            var log=position.coords.longitude;
            alert(lat+log);
            document.cookie="lat="+lat;
            document.cookie="log="+log;
            // document.cookie="lat=; max-age=0";
            // document.cookie="log=; max-age=0";

        }
    }
    </script>

<script>
  
         function getLogLet(){
           
            if(navigator.geolocation){
                
                navigator.geolocation.getCurrentPosition(showExactPosition);
                
            }else{
                x.innerHTML="Geolocation is not supported";
            }
        }
        function showExactPosition(position){
            // document.querySelector('.form input[name="lat"]').value=position.coords.latitude;
            // document.querySelector('.form input[name="log"]').value=position.coords.longitude;
            var lat=position.coords.latitude;
            var log=position.coords.longitude;
            document.cookie="lat="+lat;
            document.cookie="log="+log;
           

        }
        function showError(error){
            switch(error.code){
                case error.PERMISSION_DENIED:
                    alert("You must allow the request for Geolocation to fill out the form");
                    location.reload();
                    break;
            }
        }
    </script>