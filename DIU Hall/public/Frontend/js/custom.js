

        //id search
        $('.searchButton').click(function (){
            var id= $('.id-search').val();

            if(id.length == 0){
                console.log("Enter Your ID");
            }else{
                window.location.href="/studentSearch/"+id+""
            }

        })

        //payment
        $('.btnPayment').click(function (){
            var id = 0;
             id= $('#studentid').val();
            var date = $("#date option:selected").text();

            if(id.length == 0){
                console.log("Enter Your ID");
            }else{
                window.location.href="/example1/"+id+"/"+date+""
            }


        })

        //Login Button
        $('.loginbtnicon').click(function (){

            window.location.href="/StudentLogin"

        })






///Frontend Js





