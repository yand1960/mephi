
async function Reqest_find() {

    var promise = new Promise( async (resolve, reject) => {

        let from_url = document.getElementById("url").value;
        let string = document.getElementById("text").value;

      

     
        
        var url = "final.php?url="+from_url+"&text="+string;
        var response = await fetch(url);
        var result_req = await response.text();

        var result_json = JSON.parse(result_req);

        if (result_json.status){
        
            document.getElementById("result").innerHTML = "Результат: " + result_json.count;
            
        }
        else {
            
            document.getElementById("result").innerHTML = "Ошибка: " + result_req;
           
        }
    });
    return promise;
}
