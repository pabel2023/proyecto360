CREATE VIEW vieventos AS 
with tabla1 as(
select upper( eventos.nombre) as nombre , itemcorum.id_evento as codigo,itemcorum.participacion, sum(porcentage+0.0) coeficiente
from itemcorum 
left join eventos on eventos.id= itemcorum.id_evento
where itemcorum.participacion =0
group by eventos.nombre, eventos.id ,itemcorum.id_evento,itemcorum.participacion
order by itemcorum.id_evento
), tabla2 as (
select upper( eventos.nombre) as nombre , itemcorum.id_evento as codigo,itemcorum.participacion, sum(porcentage+0.0) coeficiente
from itemcorum 
left join eventos on eventos.id= itemcorum.id_evento
where itemcorum.participacion =1
group by eventos.nombre,eventos.id ,itemcorum.id_evento,itemcorum.participacion
order by itemcorum.id_evento
)

select distinct tabla1.nombre, tabla1.codigo,
IFNULL(tabla1.coeficiente,0) as coeficiente_inactivo,
IFNULL(tabla2.coeficiente,0)  as coeficiente_activo,
(IFNULL(tabla1.coeficiente,0)+IFNULL(tabla2.coeficiente,0))  as coeficiente_total
from tabla1
left join tabla2 on tabla2.nombre =tabla1.nombre
