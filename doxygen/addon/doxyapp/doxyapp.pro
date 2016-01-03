#
# This file was generated from doxyapp.pro.in on Mer 13 mai 2015 21:14:31 EDT
#

TEMPLATE     =	app.t
CONFIG       =	console warn_on debug
HEADERS      =	
SOURCES      =	doxyapp.cpp
LIBS          += -L../../lib -ldoxygen -lqtools -lmd5 -ldoxycfg -lvhdlparser -lpthread -liconv
DESTDIR        = 
OBJECTS_DIR    = ../../objects/doxyapp
TARGET         = ../../bin/doxyapp
INCLUDEPATH   += ../../qtools ../../src
DEPENDPATH    += ../../src
TARGETDEPS     = ../../lib/libdoxygen.a

