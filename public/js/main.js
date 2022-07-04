let data_giftCards,
    current_page = 0,
    limit = 10;
function loop() {

    for (let index = 0; index < data_giftCards.length; index++) {
        const element = data_giftCards[index];
        document.getElementById("body-table").innerHTML += `
            <tr>
                <td>${element.patient_name}</td>
                <td>${element.telephone_number}</td>
                <td>${element.res_date}</td>
             
            </tr>
        `;
                        
    }

}

function onfeatch(){
    fetch(`/showDataOfPatients`).then(data => {
        return data.json()
    }).then(data => {
        data_giftCards = data.data;
        console.log(data_giftCards)
        document.getElementById("load_first").classList.add("d-none")
        document.getElementById("body-table").innerHTML = "";
        loop();
        pagination();
       
    })
}
onfeatch();

/*function retrun pagination */

function pagination(){
    document.getElementById("page-number").innerHTML = "";
    document.getElementById("page-number").innerHTML += `
            <li class="page-item" onclick="prevpage(${current_page})">
            <button class="page-link" id="page-item">Previous</button>
            </li>
            <h6>${current_page + 1}</h6>

            <li class="page-item" onclick="nextpage(${current_page})">
            <button class="page-link " id="next">Next</button>
            </li>
    `;
}
/*next_page*/

function nextpage(this_page){
    let next_page = (this_page + 1) * limit;
    
    fetch(`/api/gift_cards?limit=${limit}&offset=${next_page}`).then(result => {
        return result.json();

    }).then(res=> {
        data_giftCards = res;
            if(data_giftCards.attributes){
                
                document.getElementById("next").classList.add("disabled");

            }else{

                document.getElementById("body-table").innerHTML  = "";
                current_page = this_page + 1;
                loop();
                pagination();
            }
            
    })
}

/*prev */
function prevpage(this_page){
    next_page = this_page
    if(next_page <= 0){
        document.getElementById("page-item").classList.add("disabled");
        let next_page = next_page = 0;

        fetch(`/api/gift_cards?limit=${limit}&offset=${next_page}`).then(result => {
            return result.json()
        }).then(result=> {
            data_giftCards = result;
            current_page = this_page - 1;
            console.log(next_page)
            document.getElementById("body-table").innerHTML  = "";
            loop();
            pagination();
    
        }).then(()=> {
            if(next_page <= 0){
                document.getElementById("page-item").classList.add("disabled");
                current_page = 0;
    
            }
        })
    }else{
        let next_page =  (this_page - 1 ) * limit; //0

        fetch(`/api/gift_cards?limit=${limit}&offset=${next_page}`).then(result => {
            return result.json()
        }).then(result=> {
            data_giftCards = result;
            current_page = this_page - 1;
            console.log(next_page)
            document.getElementById("body-table").innerHTML  = "";
            loop();
            pagination();
    
        }).then(()=> {
            if(next_page <= 0){
                document.getElementById("page-item").classList.add("disabled");
                current_page = 0;
    
            }
        })

    }

   
}
