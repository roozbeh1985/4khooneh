class ProfileAll {
    constructor() {
        this.userId = document.getElementById('cUId').value;
    }

       
   
    kifPol() {
        this.gotoview();
        let html =
            `<div class="col-lg-12 text-center pt-4">
                <img  src="` + document.getElementById('ry-locate').value + '/wp-content/themes/hooyook/profile/img/8.png' + `">
                </div>
                <p class="text-center pt-1 f-14 ry-bolder m-auto" >کیف پول من</p>`;
        html += `<div class="d-flex flex-row mt-4 justify-content-center">
                     <span class="text-dark f-14 ry-bolder">میزان اعتبار شما:</span>
                     <span class="px-2 hooyoColor ry-bold">${document.getElementById('wallet').value}</span>
                 </div>`;
        html += `<div class="mt-4 px-2">
                    <input type="number" class="text-center form-control ry-iransans" id="priceToCharge" placeholder="مبلغ به تومان">
                </div>`;
        html +=
            `<div class="mt-2 px-2">
            <div class=" mt-2 ">
                    <div class="bgHooyoColor rounded-3 text-white p-2 text-center ry-pointer" id="ryssssl" onclick="mprofile.chargePrice()">پرداخت و افزایش اعتبار</div> 
                </div>    
        </div>`;
        document.getElementById('profileHanlingSide').innerHTML = html;

    }
    chargePrice() {
        let link = document.getElementById('ry-locate').value;
        let price = document.getElementById('priceToCharge').value;
        link += `/chargewalet/?udsds=${this.userId}&pri=${price}`;
        window.location.replace(link);
    }
    sucss() {
        Swal.fire({
            confirmButtonText: "متوجه شدم",
            icon: "success",
            title: "عملیات موفقیت آمیز بود",
            text: "لغو سفارش با موفقیت انجام شد"
        });
    }
}