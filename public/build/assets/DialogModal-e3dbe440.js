import{a as c}from"./Modal-64f04b93.js";import{o as i,c as d,w as n,a as e,q as o}from"./app-2afe1bf7.js";const r={class:"px-6 py-4"},m={class:"text-lg font-medium text-gray-900"},h={class:"mt-4 text-sm text-gray-600"},f={class:"flex flex-row justify-end px-6 py-4 bg-gray-100 text-right"},u={__name:"DialogModal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(t,{emit:a}){const l=()=>{a("close")};return(s,x)=>(i(),d(c,{show:t.show,"max-width":t.maxWidth,closeable:t.closeable,onClose:l},{default:n(()=>[e("div",r,[e("div",m,[o(s.$slots,"title")]),e("div",h,[o(s.$slots,"content")])]),e("div",f,[o(s.$slots,"footer")])]),_:3},8,["show","max-width","closeable"]))}};export{u as _};
