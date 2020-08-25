# Motores de almacenamiento en MySQL para cada tabla
<!-- describe tabla -->
- MyISAM : guarda los registros en el orden en que fueron almacenados (mas eficiente SELECT) - DEFAULT - tablas planas
- Falcon
- Merge
- InnoDB : almacena fisicamente los registros en el orden de la llave primaria. No dispone de compresión de datos
            comos se tiene en MyISAM. Soporte de transacciones, garantiza la integridad de nuestras tablas (mas eficiente  INSERT UPDATE) - mas eficientes en modelos relacionales
- Archive

Todo se diferencia en los algoritmos que utIlizan para el manejo de datos
- DML
- DDD
- DCL

## Referencias

- https://codigofacilito.com/articulos/motores-mysql
- https://manuales.guebs.com/mysql-5.0/storage-engines.html