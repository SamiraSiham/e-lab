import{o as m,f as _,r as h,s as $,k as C,l as B,h as D,c as E,a as o,w as n,i as y,p,b as e,q as g,n as b,g as S,x as V,m as x,T as U,y as T,d as w,u as d,z as A}from"./app-Bv8FnFEh.js";import{_ as N}from"./_plugin-vue_export-helper-DlAUqK2U.js";import{_ as z,a as M,b as O}from"./TextInput-Cg3feFCm.js";const P={},W={class:"inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 active:bg-red-700 dark:focus:ring-offset-gray-800"};function F(t,r){return m(),_("button",W,[h(t.$slots,"default")])}const v=N(P,[["render",F]]),I={class:"fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0","scroll-region":""},K=e("div",{class:"absolute inset-0 bg-gray-500 opacity-75 dark:bg-gray-900"},null,-1),L=[K],j={__name:"Modal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(t,{emit:r}){const a=t,s=r;$(()=>a.show,()=>{a.show?document.body.style.overflow="hidden":document.body.style.overflow=null});const i=()=>{a.closeable&&s("close")},l=u=>{u.key==="Escape"&&a.show&&i()};C(()=>document.addEventListener("keydown",l)),B(()=>{document.removeEventListener("keydown",l),document.body.style.overflow=null});const c=D(()=>({sm:"sm:max-w-sm",md:"sm:max-w-md",lg:"sm:max-w-lg",xl:"sm:max-w-xl","2xl":"sm:max-w-2xl"})[a.maxWidth]);return(u,f)=>(m(),E(V,{to:"body"},[o(g,{"leave-active-class":"duration-200"},{default:n(()=>[y(e("div",I,[o(g,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0","enter-to-class":"opacity-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100","leave-to-class":"opacity-0"},{default:n(()=>[y(e("div",{class:"fixed inset-0 transform transition-all",onClick:i},L,512),[[p,t.show]])]),_:1}),o(g,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95","enter-to-class":"opacity-100 translate-y-0 sm:scale-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100 translate-y-0 sm:scale-100","leave-to-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"},{default:n(()=>[y(e("div",{class:b(["mb-6 transform overflow-hidden rounded-lg bg-white shadow-xl transition-all sm:mx-auto sm:w-full dark:bg-gray-800",c.value])},[t.show?h(u.$slots,"default",{key:0}):S("",!0)],2),[[p,t.show]])]),_:3})],512),[[p,t.show]])]),_:3})]))}},q=["type"],G={__name:"SecondaryButton",props:{type:{type:String,default:"button"}},setup(t){return(r,a)=>(m(),_("button",{type:t.type,class:"inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 dark:border-gray-500 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:focus:ring-offset-gray-800"},[h(r.$slots,"default")],8,q))}},H={class:"space-y-6"},J=e("header",null,[e("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"}," Delete Account "),e("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain. ")],-1),Q={class:"p-6"},R=e("h2",{class:"text-lg font-medium text-gray-900 dark:text-gray-100"}," Are you sure you want to delete your account? ",-1),X=e("p",{class:"mt-1 text-sm text-gray-600 dark:text-gray-400"}," Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account. ",-1),Y={class:"mt-6"},Z={class:"mt-6 flex justify-end"},ae={__name:"DeleteUserForm",setup(t){const r=x(!1),a=x(null),s=U({password:""}),i=()=>{r.value=!0,T(()=>a.value.focus())},l=()=>{s.delete(route("profile.destroy"),{preserveScroll:!0,onSuccess:()=>c(),onError:()=>a.value.focus(),onFinish:()=>s.reset()})},c=()=>{r.value=!1,s.clearErrors(),s.reset()};return(u,f)=>(m(),_("section",H,[J,o(v,{onClick:i},{default:n(()=>[w("Delete Account")]),_:1}),o(j,{show:r.value,onClose:c},{default:n(()=>[e("div",Q,[R,X,e("div",Y,[o(z,{for:"password",value:"Password",class:"sr-only"}),o(M,{id:"password",ref_key:"passwordInput",ref:a,modelValue:d(s).password,"onUpdate:modelValue":f[0]||(f[0]=k=>d(s).password=k),type:"password",class:"mt-1 block w-3/4",placeholder:"Password",onKeyup:A(l,["enter"])},null,8,["modelValue"]),o(O,{message:d(s).errors.password,class:"mt-2"},null,8,["message"])]),e("div",Z,[o(G,{onClick:c},{default:n(()=>[w(" Cancel ")]),_:1}),o(v,{class:b(["ms-3",{"opacity-25":d(s).processing}]),disabled:d(s).processing,onClick:l},{default:n(()=>[w(" Delete Account ")]),_:1},8,["class","disabled"])])])]),_:1},8,["show"])]))}};export{ae as default};