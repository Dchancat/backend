(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2c20e9dc"],{1526:function(t,s,e){},"23dc":function(t,s,e){"use strict";var i=e("b65d"),a=e.n(i);a.a},6546:function(t,s,e){"use strict";e.r(s);var i=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"my_collage"},[e("div",{staticClass:"collage_banner"},[e("activeBanner",{attrs:{active:t.active}})],1),t._l(t.goodslists,function(s,i){return e("div",{key:i,staticClass:"goods"},[e("span",{staticClass:"collage_tag"},[t._v(t._s(s.event.member_limit)+"人团")]),e("div",{staticClass:"active_img"},[e("img",{staticClass:"good_img",attrs:{src:s.goods.cover}})]),e("div",{staticClass:"active_time"},[1==s.group.status?e("span",[e("span",{},[t._v("赞！开团成功！")])]):1!=s.group.status&&s.event.end_time<t.cd.nowtime?e("span",[e("span",{},[t._v("活动已结束")])]):1!=s.group.status&&s.event.end_time>t.cd.nowtime&&s.group.left_time>0?e("span",[e("span",{},[t._v("剩余时间:"+t._s(s.group.time_str))])]):e("span",[e("span",{},[t._v("超时，拼团失败")])])]),e("div",{staticClass:"active_good_detail"},[e("div",{staticClass:"good_detail"},[e("p",{staticClass:"title"},[t._v(t._s(s.goods.title))]),e("p",{staticClass:"red active_price"},[e("span",{staticClass:"price-icon"},[t._v("¥")]),e("strong",[t._v(t._s(s.goods.sale_price))])]),e("p",{staticClass:"market_price"},[e("del",[e("span",{staticClass:"prize-icon"},[t._v("¥")]),t._v(t._s(s.goods.market_price))])])]),e("router-link",{staticClass:"active-btn",attrs:{to:"/collage/group_detail/"+s.group.id}},[t._v("查看详情")])],1)])}),e("div",{directives:[{name:"show",rawName:"v-show",value:""==t.goodslists,expression:"goodslists == ''"}],staticClass:"active_null"},[e("span",[t._v("还未参与拼团")])])],2)},a=[],c=function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"active_banner"},[null==t.eventinfo.cover||""==t.eventinfo.cover?e("img",{staticClass:"active_bg",attrs:{src:t.active.img}}):e("img",{staticClass:"active_bg",attrs:{src:t.eventinfo.cover}})])},n=[],o={props:{active:{},eventinfo:{default:function(){return{cover:null}}}}},l=o,r=(e("23dc"),e("048f")),v=Object(r["a"])(l,c,n,!1,null,"30d7e410",null);v.options.__file="activeBanner.vue";var d=v.exports,_=function(){var t=this,s=t.$createElement,e=t._self._c||s;return t.goodslists.length>0?e("div",{staticClass:"active_goods"},t._l(t.goodslists,function(s,i){return e("div",{key:i,staticClass:"goods"},["拼团"===t.active.name?e("span",{staticClass:"collage_tag"},[t._v(t._s(t.eventinfo.member_limit)+"人团")]):t._e(),e("div",{staticClass:"active_img"},[e("img",{staticClass:"good_img",attrs:{src:s.cover}})]),t.cd.endtime>t.cd.nowtime&&t.cd.nowtime>t.cd.starttime?e("div",{staticClass:"active_time"},[t._v("剩余时间:"+t._s(t.cd.day)+"天"+t._s(t.cd.hour)+"小时"+t._s(t.cd.min)+"分钟"+t._s(t.cd.sec)+"秒")]):t.cd.nowtime>t.cd.endtime?e("div",{staticClass:"active_time active_timeout"},[t._v("活动已结束")]):e("div",{staticClass:"active_time active_not_begin"},[t._v("活动未开始")]),e("div",{staticClass:"active_good_detail"},[e("div",{staticClass:"good_detail"},[e("p",{staticClass:"title"},[t._v(t._s(s.title))]),e("p",{staticClass:"red active_price"},[e("span",{staticClass:"price-icon"},[t._v("¥")]),e("strong",[t._v(t._s(s.sale_price))]),e("small",{staticClass:"tag"},[t._v(t._s(t.active.name))])]),e("p",{staticClass:"market_price"},[e("del",[e("span",{staticClass:"prize-icon"},[t._v("¥")]),t._v(t._s(s.market_price))])])]),e("router-link",{staticClass:"active-btn",attrs:{to:t.active.url+s.id}},[t._v(t._s(t.active.name))])],1)])}),0):e("div",{staticClass:"active_null"},[e("span",[t._v("活动商品为空")])])},g=[],p={props:{cd:{},goodslists:[],active:{},eventinfo:{},myformat:[]},components:{},methods:{}},m=p,u=(e("bd73"),Object(r["a"])(m,_,g,!1,null,"6bf5f326",null));u.options.__file="activeContent.vue";var f=u.exports,C=e("ed08"),b=e("fade"),h={data:function(){return{cd:{day:0,hour:0,min:0,sec:0,satrttime:0,endtime:0,nowtime:0},envetinfo:{},str:"",goodslists:[],active:{name:"拼团",img:"https://leyao.tv/yi/images/collagebanner.jpg",url:"../collage_detail/main"}}},components:{activeBanner:d,activeContent:f},methods:{getData:function(t){var s=this;Object(C["h"])(C["g"]+"/collage/Api/my_collage",{event_id:t,PHPSESSID:window.localStorage.getItem("PHPSESSID")}).then(function(t){0==t.code?Object(b["d"])(t.res):s.goodslists=t.goods_lists})},cdtime:function(){var t=this;setInterval(function(){for(var s=0;s<t.goodslists.length;s++){var e=t.goodslists[s].group.left_time--,i=parseInt(e/60/60/24),a=parseInt(e/60/60%24),c=parseInt(e/60%60),n=parseInt(e%60);this.str=i+"天"+a+":"+c+":"+n,t.goodslists[s].group.time_str=i+"天"+a+":"+c+":"+n}},1e3)}},created:function(){var t=this.$route.params.id;this.cd.nowtime=Date.parse(new Date)/1e3,this.getData(t),this.cdtime()}},w=h,k=(e("d58d"),Object(r["a"])(w,i,a,!1,null,"d2b7c7b0",null));k.options.__file="index.vue";s["default"]=k.exports},"7bc0":function(t,s,e){},b65d:function(t,s,e){},bd73:function(t,s,e){"use strict";var i=e("7bc0"),a=e.n(i);a.a},d58d:function(t,s,e){"use strict";var i=e("1526"),a=e.n(i);a.a}}]);
//# sourceMappingURL=chunk-2c20e9dc.a409b584.js.map