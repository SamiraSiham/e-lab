import{T as g,o as i,f as m,a as r,u as t,b as e,t as a,e as _,i as u,j as c,g as x,w as b,F as p,Z as h,d as w,k as y}from"./app-DpsIWInF.js";import{_ as v,a as k}from"./Header-BClI0ogx.js";import"./ens-B4PZi0Vp.js";const j={class:"flex flex-row gap-x-3 font-Aldrich"},N={class:"flex flex-col w-full"},V={class:"bg-white mx-20 py-5"},A={class:"text-3xl text-green font-medium"},B={class:"bg-beige px-3 flex flex-col items-center rounded-lg pt-2 pb-3 ml-20 mt-2 justify-center"},$=e("h1",{class:"text-green text-2xl font-semibold"}," Ajouter une salle ",-1),C={class:"flex flex-row max-md:flex-col gap-x-4 items-center justify-between"},T={class:"my-6 w-1/2 max-md:w-full"},q=e("label",{for:"password",class:"block mb-2 text-lg font-medium text-white"},"Numéro de salle",-1),D={key:0,class:"text-red-600"},F={class:"my-6 w-1/2 max-md:w-full"},M=e("label",{for:"password",class:"block mb-2 text-lg font-medium text-white"},"Nom de salle",-1),S={key:0,class:"text-red-600"},U={class:"flex md:gap-x-3 max-md:flex-col"},E=e("button",{type:"submit",class:"text-white bg-green hover:bg-white hover:text-green border border-green font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"}," Ajouter ",-1),G={__name:"Create",props:{errors:Object},setup(l){const s=g({num_salle:null,nom_salle:null}),f=()=>{s.post("/salles")};return(n,o)=>(i(),m(p,null,[r(t(h),{title:"salles"}),e("div",j,[r(v),e("div",N,[r(k),e("div",V,[e("h1",A," Bonjour "+a(n.$page.props.auth.user.prenom)+" "+a(n.$page.props.auth.user.nom),1)]),e("div",B,[$,e("form",{class:"bg-orange p-5 text-white rounded-lg w-[85%] my-7",onSubmit:_(f,["prevent"])},[e("div",C,[e("div",T,[q,u(e("input",{type:"text",id:"num_salle","onUpdate:modelValue":o[0]||(o[0]=d=>t(s).num_salle=d),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5",required:""},null,512),[[c,t(s).num_salle]]),l.errors.num_salle?(i(),m("div",D,a(l.errors.num_salle),1)):x("",!0)]),e("div",F,[M,u(e("input",{type:"text",id:"nom_salle","onUpdate:modelValue":o[1]||(o[1]=d=>t(s).nom_salle=d),class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green focus:border-green block w-full p-2.5",required:""},null,512),[[c,t(s).nom_salle]]),l.errors.nom_salle?(i(),m("div",S,a(l.errors.nom_salle),1)):x("",!0)])]),e("div",U,[E,r(t(y),{href:n.route("salles.index"),class:"text-white bg-blue hover:bg-white hover:text-blue border border-blue font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"},{default:b(()=>[w(" Annuler ")]),_:1},8,["href"])])],32)])])])],64))}};export{G as default};