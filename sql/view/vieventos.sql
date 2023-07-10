
CREATE VIEW vieventos AS 
with tabla1 as(
select upper( eventos.nombre) as nombre , itemcorum.id_evento as codigo,itemcorum.estado, sum(porcentage+0.0) coeficiente
from itemcorum 
left join eventos on eventos.codigo= itemcorum.id_evento
where itemcorum.estado ='I'
group by eventos.id ,itemcorum.id_evento,itemcorum.estado
order by itemcorum.id_evento
), tabla2 as (
select upper( eventos.nombre) as nombre , itemcorum.id_evento as codigo,itemcorum.estado, sum(porcentage+0.0) coeficiente
from itemcorum 
left join eventos on eventos.codigo= itemcorum.id_evento
where itemcorum.estado ='A'
group by eventos.id ,itemcorum.id_evento,itemcorum.estado
order by itemcorum.id_evento
)

select tabla1.nombre, tabla1.codigo,
IFNULL(tabla1.coeficiente,0) as coeficiente_inactivo,
IFNULL(tabla2.coeficiente,0)  as coeficiente_activo,
(tabla1.coeficiente+tabla2.coeficiente)  as coeficiente_total
from tabla1
left join tabla2 on tabla2.nombre =tabla1.nombre
