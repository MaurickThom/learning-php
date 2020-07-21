# Motores de almacenamiento en MySQL para cada tabla

- MyISAM : guarda los registros en el orden en que fueron almacenados (mas eficiente SELECT)
- Falcon
- Merge
- InnoDB : almacena fisicamente los registros en el orden de la llave primaria. No dispone de compresión de datos
            comos se tiene en MyISAM. Soporte de transacciones, garantiza la integridad de nuestras tablas (mas eficiente  INSERT UPDATE)
- Archive

## Referencias

- https://codigofacilito.com/articulos/motores-mysql
