import{_ as y}from"./AppLayout-CsZ4HSti.js";import{o as r,e as n,a as e,F as u,h as c,t as i,g as s,f as d,u as _,c as f,w as g,b as q}from"./app-BdGig4v2.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const x=[{name:"User",endpoints:[{endpoint:"register",method:"POST",scope:"public",interface:[{name:"name",type:"string",required:!0},{name:"email",type:"email",required:!0},{name:"password",type:"string",required:!0},{name:"password_confirmation",type:"string",required:!0},{name:"role",type:"string (agency, user)",required:!0}]},{endpoint:"login",method:"POST",scope:"public",interface:[{name:"email",type:"email",required:!0},{name:"password",type:"string",required:!0}]},{endpoint:"logout",method:"POST",scope:"private"}]},{name:"Tags",endpoints:[{endpoint:"tags",method:"GET",scope:"private"},{endpoint:"tags/10",method:"GET",scope:"private"},{endpoint:"tags",method:"POST",scope:"private",interface:[{name:"name",type:"string",required:!0},{name:"icon",type:"string",required:!0}]},{endpoint:"tags/12",method:"DELETE",scope:"private"}]},{name:"Agencies",endpoints:[{endpoint:"agencies",method:"GET",scope:"private"},{endpoint:"agencies",method:"POST",scope:"private"},{endpoint:"agencies/{id}",method:"PUT",scope:"private",interface:[{name:"name",type:"string",required:!0},{name:"name_juridical",type:"string",required:!0},{name:"cover",type:"file",required:!0},{name:"bio",type:"string",required:!0},{name:"logo",type:"file",required:!0},{name:"cedula",type:"string",required:!0},{name:"phone_number",type:"string",required:!0},{name:"address",type:"string",required:!0},{name:"email",type:"string",required:!0},{name:"bank_account",type:"string",required:!0}]},{endpoint:"agencies",method:"POST",scope:"private",interface:[{name:"name",type:"string",required:!0},{name:"name_juridical",type:"string",required:!0},{name:"cover",type:"file",required:!0},{name:"bio",type:"string",required:!0},{name:"logo",type:"file",required:!0},{name:"cedula",type:"string",required:!0},{name:"phone_number",type:"string",required:!0},{name:"address",type:"string",required:!0},{name:"email",type:"string",required:!0},{name:"bank_account",type:"string",required:!0}]},{endpoint:"agencies/12",method:"DELETE",scope:"private"}]},{name:"Destinations",endpoints:[{endpoint:"destinations",method:"GET",scope:"private"},{endpoint:"destinations/{id}",method:"GET",scope:"private"},{endpoint:"destinations",method:"POST",scope:"private",interface:[{name:"name",type:"string",required:!0},{name:"description",type:"string",required:!0},{name:"location",type:"string",required:!0},{name:"cover",type:"string",required:!0},{name:"address",type:"string",required:!0},{name:"logo",type:"string",required:!0},{name:"phone_number",type:"string",required:!0},{name:"city",type:"string",required:!0},{name:"state",type:"string",required:!0},{name:"country",type:"string",required:!0},{name:"type",type:"string",required:!0},{name:"category",type:"string",required:!0},{name:"status",type:"string",required:!0},{name:"age_restriction",type:"number",required:!1}]},{endpoint:"destinations/{id}",method:"PUT",scope:"private",interface:[{name:"name",type:"string",required:!1},{name:"description",type:"string",required:!1},{name:"location",type:"string",required:!1},{name:"cover",type:"string",required:!1},{name:"address",type:"string",required:!1},{name:"logo",type:"string",required:!1},{name:"phone_number",type:"string",required:!1},{name:"city",type:"string",required:!1},{name:"state",type:"string",required:!1},{name:"country",type:"string",required:!1},{name:"type",type:"string",required:!1},{name:"category",type:"string",required:!1},{name:"status",type:"string",required:!1},{name:"age_restriction",type:"number",required:!1}]},{endpoint:"destinations/{id}",method:"DELETE",scope:"private"},{endpoint:"destinations/{id}/tagas",method:"POST",scope:"private",interface:[{name:"tags",type:"number[]",required:!0}]}]},{name:"Profiles",endpoints:[{endpoint:"profiles",method:"GET",scope:"private"},{endpoint:"profiles/10",method:"GET",scope:"private"},{endpoint:"profiles/10",method:"DELETE",scope:"private"},{endpoint:"profiles",method:"POST",scope:"private",interface:[{name:"name",type:"string",required:!0},{name:"nationality",type:"string",required:!0},{name:"date_of_birth",type:"date",required:!0},{name:"photo",type:"file",required:!1}]},{endpoint:"profiles/1",method:"PUT",scope:"private",interface:[{name:"name",type:"string",required:!1},{name:"nationality",type:"string",required:!1},{name:"date_of_birth",type:"date",required:!1},{name:"photo",type:"file",required:!1}]},{endpoint:"profiles/1/guests",method:"GET",scope:"private"},{endpoint:"profiles/{id}/guests/{id}",method:"GET",scope:"private"}]}],v={class:"p-6 lg:p-8 bg-white border-b border-gray-200"},b={class:"flex flex-col gap-2"},T=["element"],w={class:"text-2xl mb-4"},E={class:"flex flex-col gap-2 g"},k=["element"],P={key:0,class:"text-sm col-span-2 inline-flex text-left items-center space-x-4 bg-green-600 text-white rounded-lg p-4 pl-6"},S={class:"bg-white ml-4 text-gray-900 rounded-full px-2 py-1"},$={key:1,class:"text-sm col-span-2 inline-flex text-left items-center space-x-4 bg-yellow-600 text-white rounded-lg p-4 pl-6"},G={class:"bg-white ml-4 text-gray-900 rounded-full px-2 py-1"},O={key:2,class:"text-sm col-span-2 inline-flex text-left items-center space-x-4 bg-blue-600 text-white rounded-lg p-4 pl-6"},C={class:"bg-white ml-4 text-gray-900 rounded-full px-2 py-1"},D={key:3,class:"text-sm col-span-2 inline-flex text-left items-center space-x-4 bg-red-600 text-white rounded-lg p-4 pl-6"},L={class:"bg-white ml-4 text-gray-900 rounded-full px-2 py-1"},B={class:"text-sm col-span-10 sm:text-base inline-flex text-left items-center space-x-4 bg-gray-800 text-white rounded-lg p-4 pl-6"},U={class:"flex gap-4"},V={class:"flex-1"},N=e("span",{class:"text-yellow-500"}," https://api.dipledev.net/api/v1/ ",-1),z=["onClick"],A=e("path",{d:"M8 2a1 1 0 000 2h2a1 1 0 100-2H8z"},null,-1),H=e("path",{d:"M3 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v6h-4.586l1.293-1.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L10.414 13H15v3a2 2 0 01-2 2H5a2 2 0 01-2-2V5zM15 11h2a1 1 0 110 2h-2v-2z"},null,-1),M=[A,H],j={key:4,class:"col-span-12"},F=e("summary",null,"Interfaces",-1),I={class:"bg-black flex flex-col"},J={__name:"Endpoint",setup(h){const m=l=>{const a=document.createElement("textarea");a.value=l,document.body.appendChild(a),a.select(),document.execCommand("copy"),document.body.removeChild(a)};return(l,a)=>(r(),n("div",null,[e("div",v,[e("div",b,[(r(!0),n(u,null,c(_(x),p=>(r(),n("div",{class:"p-4 bg-gray-100 rounded-l",key:p,element:p},[e("h2",w,"Endpoint - "+i(p.name),1),e("div",E,[(r(!0),n(u,null,c(p.endpoints,t=>(r(),n("div",{key:t,element:t,class:"grid grid-cols-12 gap-2 py-4 bg-gray-100 rounded-lg"},[t.method=="GET"?(r(),n("div",P,[s(i(t.method)+" ",1),e("span",S,i(t.scope),1)])):d("",!0),t.method=="PUT"?(r(),n("div",$,[s(i(t.method)+" ",1),e("span",G,i(t.scope),1)])):d("",!0),t.method=="POST"?(r(),n("div",O,[s(i(t.method)+" ",1),e("span",C,i(t.scope),1)])):d("",!0),t.method=="DELETE"?(r(),n("div",D,[s(i(t.method)+" ",1),e("span",L,i(t.scope),1)])):d("",!0),e("code",B,[e("span",U,[e("span",V,[N,e("span",null,i(t.endpoint),1)])]),(r(),n("svg",{onClick:o=>m(`https://api.dipledev.net/api/v1/${t.endpoint}`),class:"shrink-0 h-5 w-5 transition text-gray-500 group-hover:text-white cursor-pointer",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true"},M,8,z))]),t.interface?(r(),n("details",j,[F,e("div",null,[e("pre",I,[s("                            "),(r(!0),n(u,null,c(t.interface,o=>(r(),n("span",{class:"text-left text-white inline",key:o.name},i(`${o.name}: ${o.type} ${o.required==!0?"required":"optional"}`),1))),128)),s(`
                           `)])])])):d("",!0)],8,k))),128))])],8,T))),128))])])]))}},K=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Api Doc ",-1),Q={class:"py-12"},R={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},W={class:"bg-white overflow-hidden shadow-xl sm:rounded-lg"},ee={__name:"Api",setup(h){return(m,l)=>(r(),f(y,{title:"Dashboard"},{header:g(()=>[K]),default:g(()=>[e("div",Q,[e("div",R,[e("div",W,[q(J)])])])]),_:1}))}};export{ee as default};
