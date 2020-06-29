# -*- coding: utf-8 -*-
"""
Created on Thu Nov 14 00:29:59 2019

@author: ISAACGONZALEZGUTIERR
"""

import pandas as pd
import numpy as np


#Importando el dataset
mainpath = 'C:/Users/ISAACGONZALEZGUTIERR/Documents/Personal/Proyecto Modular/datasets/concentrado_binario_2class_validacion_Mes/'

subset1 = pd.read_csv(mainpath + 'subset_atus_anual_2011_binario_2class_validacion_Mes.csv')
subset2 = pd.read_csv(mainpath + 'subset_atus_anual_2012_binario_2class_validacion_Mes.csv')
subset3 = pd.read_csv(mainpath + 'subset_atus_anual_2013_binario_2class_validacion_Mes.csv')
subset4 = pd.read_csv(mainpath + 'subset_atus_anual_2014_binario_2class_validacion_Mes.csv')
subset5 = pd.read_csv(mainpath + 'subset_atus_anual_2015_binario_2class_validacion_Mes.csv')
subset6 = pd.read_csv(mainpath + 'subset_atus_anual_2016_binario_2class_validacion_Mes.csv')
subset7 = pd.read_csv(mainpath + 'subset_atus_anual_2017_binario_2class_validacion_Mes.csv')


#Concatenamos los dataset
subset = pd.concat([subset1, subset2, subset3, subset4, subset5, subset6, subset7], axis = 0)
subset.to_csv(mainpath + 'subset_atus_anual_2011-17_binario_2class_validacion_Mes.csv',
              index= False)

#Verificamos la cantidad de regristros de cada clase
subset['CLASACC'].value_counts()























