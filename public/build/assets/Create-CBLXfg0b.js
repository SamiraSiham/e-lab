import{l as f,T as x,o as n,f as d,a as l,u as t,b as e,t as i,e as h,i as u,m as p,F as g,p as v,j as y,w,Z as k,d as j,k as V,q as $}from"./app-DpsIWInF.js";import{_ as z,a as A}from"./Header-BClI0ogx.js";import{_ as m}from"./InputError-D4Hnov3B.js";import"./ens-B4PZi0Vp.js";const B={class:"flex flex-row gap-x-3 font-Aldrich"},C={class:"flex flex-col w-full"},M={class:"bg-white mx-20 py-5"},N={class:"text-3xl text-green font-medium"},S={class:"bg-beige px-3 flex flex-col items-center rounded-lg pt-2 pb-3 ml-20 mt-2 justify-center"},T=e("h1",{class:"text-green text-2xl font-semibold"}," Ajouter un Placard ",-1),F={class:"grid gap-6 mb-6 md:grid-cols-2"},U=e("label",{for:"first_name",class:"block mb-2 text-md font-medium text-white"},"Salle",-1),q=e("option",{selected:!0,value:null}," Choisissez une salle ",-1),D=["value"],E=e("label",{for:"first_name",class:"block mb-2 text-md font-medium text-white"},"Numero de placard",-1),L={class:"mb-6"},O=e("label",{for:"email",class:"block mb-2 text-md font-medium text-white"},"Type",-1),P=e("option",{selected:!0,value:null}," Choisissez un type ",-1),Z=e("option",{value:"vertical"},"vertical",-1),G=e("option",{value:"horizontal"},"horizontal",-1),H=[P,Z,G],I={class:"flex md:gap-x-3 max-md:flex-col max-md:gap-y-2"},J=e("button",{type:"submit",class:"text-white bg-green hover:bg-white hover:text-green border border-green font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"}," Ajouter ",-1),X={__name:"Create",props:{salles:Object},setup(_){const c=_;f(()=>{console.log(c)});const s=x({num_placard:null,salle_id:null,type:null}),b=()=>{$.post("/placards",s)};return(a,r)=>(n(),d(g,null,[l(t(k),{title:"Enseignement"}),e("div",B,[l(z),e("div",C,[l(A),e("div",M,[e("h1",N," Bonjour "+i(a.$page.props.auth.user.prenom)+" "+i(a.$page.props.auth.user.nom),1)]),e("div",S,[T,e("form",{class:"bg-orange p-5 text-white rounded-lg w-[85%] my-7",onSubmit:h(b,["prevent"])},[e("div",F,[e("div",null,[U,u(e("select",{class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue focus:border-blue block w-full p-2.5","onUpdate:modelValue":r[0]||(r[0]=o=>t(s).salle_id=o)},[q,(n(!0),d(g,null,v(c.salles,o=>(n(),d("option",{key:o.id,value:o.id},i(o.nom_salle),9,D))),128))],512),[[p,t(s).salle_id]]),l(m,{class:"mt-1",message:t(s).errors.salle_id},null,8,["message"])]),e("div",null,[E,u(e("input",{type:"text",id:"num_placard","onUpdate:modelValue":r[1]||(r[1]=o=>t(s).num_placard=o),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5",required:""},null,512),[[y,t(s).num_placard]]),l(m,{class:"mt-1",message:t(s).errors.module_id},null,8,["message"])])]),e("div",L,[O,u(e("select",{class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue focus:border-blue block w-full p-2.5","onUpdate:modelValue":r[2]||(r[2]=o=>t(s).type=o)},H,512),[[p,t(s).type]]),l(m,{class:"mt-1",message:t(s).errors.type},null,8,["message"])]),e("div",I,[J,l(t(V),{href:a.route("placards.index"),class:"text-white bg-blue hover:bg-white hover:text-blue border border-blue font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"},{default:w(()=>[j(" Annuler ")]),_:1},8,["href"])])],32)])])])],64))}};export{X as default};