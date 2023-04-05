import{r as u,v as p,c as w,w as e,o as y,f as t,a as i,b as o,n as T,u as n}from"./app-2afe1bf7.js";import{_ as v}from"./Modal-64f04b93.js";import{_ as g}from"./ConfirmationModal-37220a60.js";import{_ as r}from"./DangerButton-5495384b.js";import{_ as h}from"./SecondaryButton-a4dc40f0.js";import"./SectionTitle-54f69561.js";import"./_plugin-vue_export-helper-c27b6911.js";const x=i("div",{class:"max-w-xl text-sm text-gray-600"}," Once a team is deleted, all of its resources and data will be permanently deleted. Before deleting this team, please download any data or information regarding this team that you wish to retain. ",-1),C={class:"mt-5"},j={__name:"DeleteTeamForm",props:{team:Object},setup(m){const d=m,a=u(!1),l=p({}),c=()=>{a.value=!0},f=()=>{l.delete(route("teams.destroy",d.team),{errorBag:"deleteTeam"})};return(D,s)=>(y(),w(v,null,{title:e(()=>[t(" Delete Team ")]),description:e(()=>[t(" Permanently delete this team. ")]),content:e(()=>[x,i("div",C,[o(r,{onClick:c},{default:e(()=>[t(" Delete Team ")]),_:1})]),o(g,{show:a.value,onClose:s[1]||(s[1]=_=>a.value=!1)},{title:e(()=>[t(" Delete Team ")]),content:e(()=>[t(" Are you sure you want to delete this team? Once a team is deleted, all of its resources and data will be permanently deleted. ")]),footer:e(()=>[o(h,{onClick:s[0]||(s[0]=_=>a.value=!1)},{default:e(()=>[t(" Cancel ")]),_:1}),o(r,{class:T(["ml-3",{"opacity-25":n(l).processing}]),disabled:n(l).processing,onClick:f},{default:e(()=>[t(" Delete Team ")]),_:1},8,["class","disabled"])]),_:1},8,["show"])]),_:1}))}};export{j as default};
