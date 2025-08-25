<div class="section" id="section5">
    <div class="container-fluid">
        <div class="row">
            <style>
                #map{
                    height:500px!important;
                }
                .text-gandom{
                    color: #ffd78e!important;
                }
            </style>
            <div class="col-md-6 ">

                <h4 style="margin-top: 20% ;padding-right: 15%; font-size: 20px">&nbsp;<i style="margin-top: -10px" class="fa fa-map-marker ck-icons text-gandom"></i><span class="text-gandom font-weight-bold">آدرس:</span>&nbsp; تهران، میدان انقلاب اسلامی، ابتدای کارگر شمالی، کوچه برهانی پلاک 19</h4>
                <h4 style="margin-top: 30px ;padding-right: 15%; font-size: 20px"><i style="margin-top: -10px" class="fa fa-phone-square ck-icons text-gandom"></i>&nbsp;<span class="text-gandom font-weight-bold">تلفن های تماس :</span>71 81 92 66 -96 77 92 66 - 59 58 59 66</h4>
                <h4 style="margin-top: 30px ;padding-right: 15%; font-size: 20px"><i style="margin-top: -10px" class="fa fa-mobile ck-icons text-gandom"></i>&nbsp;<span class="text-gandom font-weight-bold">موبایل :</span> 6200026 - 0912</h4>
                <h4 style="margin-top: 30px ;padding-right: 15%; font-size: 20px"><i style="margin-top: -10px" class="fa fa-telegram ck-icons text-gandom"></i>&nbsp;<span class="text-gandom font-weight-bold">تلگرام :</span> <a target="_blank" class="text-dark" href="https://telegram.me/charkhooneh"<p dir="ltr">@charkhooneh</p></a></h4>
                <h4 style="margin-top: 30px ;padding-right: 15%; font-size: 20px"><i style="margin-top: -10px" class="fa fa-instagram ck-icons text-gandom"></i>&nbsp;<span class="text-gandom font-weight-bold">اینستاگرام :</span> <a target="_blank" class="text-dark" href="https://www.instagram.com/4khoonehpress/"<p dir="ltr" ><span style="font-family: 'Times New Roman';font-size: 25px">4</span>khoonehpress</p></a></h4>
            </div>
            <div class="col-md-6  d-none d-sm-block" style="margin-top:57px">
                <div class="map" id="map">
                    <script>
                        function initMap() {
                            var uluru = {lat: 35.701996, lng: 51.392352};
                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 16,
                                center: uluru
                            });
                            var marker = new google.maps.Marker({
                                position: uluru,
                                map: map
                            });
                        }
                    </script>
                    <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeRuMq2YDUzPqTUqQ8O9ma0zQ4Jc2-9MM&callback=initMap">
                    </script>
                </div>
            </div>

        </div>
    </div>
    <div class="ck-container-scroll">
        <div style="cursor: pointer" class="container" id="moveSectionDown">
            <div class="chevron"></div>
            <div class="chevron"></div>
            <div class="chevron"></div>
            <span class="text">Scroll down</span>
        </div>
    </div>
</div>