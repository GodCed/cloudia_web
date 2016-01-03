#
# This file was generated from Makefile.in on Mer 13 mai 2015 21:14:31 EDT
#

DOXYGEN   = /Users/DonavanMartin/Desktop/ClouDIA_WEB/doxygen
TMAKEPATH = /Users/DonavanMartin/Desktop/ClouDIA_WEB/doxygen/tmake/lib/macosx-c++
ENV       = env TMAKEPATH="$(TMAKEPATH)"
TMAKE     = /Users/DonavanMartin/Desktop/ClouDIA_WEB/doxygen/tmake/bin/tmake
MAKE      = /usr/bin/make
PYTHON    = /usr/bin/python
PERL      = /usr/bin/perl
LEX       = /usr/bin/flex
RM        = rm -f
CP        = cp
VERSION   = 1.8.9.1
INSTALL   = /usr/local
INSTTOOL  = /usr/bin/install
DOXYDOCS  = ..
DOCDIR    = $(INSTALL)/share/doc/packages/doxygen
QTDIR     = 
QMAKEEXE  = 
MKSPECS   = -spec macx-g++
#
# 
#
# Copyright (C) 1997-2015 by Dimitri van Heesch.
# 
# Permission to use, copy, modify, and distribute this software and its
# documentation under the terms of the GNU General Public License is hereby 
# granted. No representations are made about the suitability of this software 
# for any purpose. It is provided "as is" without express or implied warranty.
# See the GNU General Public License for more details.
# 

QMAKE=$(QTDIR)/bin/$(QMAKEEXE) $(MKSPECS)
INCBUFSIZE=$(PYTHON) ../../src/increasebuffer.py

all: Makefile.doxywizard  
	$(MAKE) -f Makefile.doxywizard LEX=$(LEX) PYTHON=$(PYTHON) INCBUFSIZE="$(INCBUFSIZE)"

Makefile.doxywizard: doxywizard.pro
	$(QMAKE) doxywizard.pro -o Makefile.doxywizard

qmake: 
	$(QMAKE) doxywizard.pro -o Makefile.doxywizard

clean: Makefile.doxywizard 
	$(MAKE) -f Makefile.doxywizard clean 

distclean: Makefile.doxywizard
	$(MAKE) -f Makefile.doxywizard distclean 
	$(RM) Makefile.doxywizard

install:
	$(INSTTOOL) -d $(INSTALL)/bin	
	$(INSTTOOL) -m 755 ../../bin/doxywizard $(INSTALL)/bin	
	$(INSTTOOL) -d $(INSTALL)/$(MAN1DIR)
	cat ../../doc/doxywizard.1 | sed -e "s/DATE/$(DATE)/g" -e "s/VERSION/$(VERSION)/g" > doxywizard.1
	$(INSTTOOL) -m 644 doxywizard.1 $(INSTALL)/$(MAN1DIR)/doxywizard.1
	rm doxywizard.1

FORCE:
