<?php
Yii::setAlias ( '@common', dirname ( __DIR__ ) );

//keep for API use
Yii::setAlias ( '@api', dirname ( dirname ( __DIR__ ) ) . '/api' );
Yii::setAlias ( '@apiV2', dirname ( dirname ( __DIR__ ) ) . '/apiV2' );

//normal web app use
Yii::setAlias ( '@frontend', dirname ( dirname ( __DIR__ ) ) . '/frontend' );
Yii::setAlias ( '@backendplus', dirname ( dirname ( __DIR__ ) ) . '/backendplus' );

//console App use
Yii::setAlias ( '@console', dirname ( dirname ( __DIR__ ) ) . '/console' );
