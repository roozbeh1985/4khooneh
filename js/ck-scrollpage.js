/**
 * Created by roozbeh on 1/16/2018.
 */
function ck_initialization() {
    $('#myContainer').fullpage({
        sectionsColor: ['rgb(161, 212, 33)', 'rgb(255, 204, 41)', 'rgb(171, 31, 34)', 'rgb(7, 145, 195)', 'rgb(111, 188, 216)'],
        anchors: ['firstPage', '4thpage', '5thpage', '6thpage', 'lastPage'],
        resize: true,
        animateAnchor: true,
        scrollOverflow: true,
        easing: 'easeInOutCubic',
        easingcss3: 'ease',
        fadingEffect: false,
        autoScrolling: true,
        responsive: 900,
        fitSection: true,

        navigation: true,
        continuousVertical: true,
        paddingTop: '20px',
        css3: true,
        onLeave: function (index, nextIndex, direction) {
            console.log("onLeave--" + "index: " + index + " nextIndex: " + nextIndex + " direction: " + direction);
        },
        afterLoad: function (anchorLink, index) {
            console.log("afterLoad--" + "anchorLink: " + anchorLink + " index: " + index);

        },
        afterSlideLoad: function (anchorLink, index, slideAnchor, slideIndex) {
            console.log("afterSlideLoad--" + "anchorLink: " + anchorLink + " index: " + index + " slideAnchor: " + slideAnchor + " slideIndex: " + slideIndex);
        },
        onSlideLeave: function (anchorLink, index, slideIndex, direction) {
            console.log("onSlideLeave--" + "anchorLink: " + anchorLink + " index: " + index + " slideIndex: " + slideIndex + " direction: " + direction);
        },
        afterRender: function () {
            console.log("afterRender");
        },
        afterResize: function () {
            console.log("afterResize");
        }
    });
}