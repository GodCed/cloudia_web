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
# Copyright (C) 1997-2000 by Dimitri van Heesch.
# 
# Permission to use, copy, modify, and distribute this software and its
# documentation under the terms of the GNU General Public License is hereby 
# granted. No representations are made about the suitability of this software 
# for any purpose. It is provided "as is" without express or implied warranty.
# See the GNU General Public License for more details.
# 
# Documents produced by Doxygen are derivative works derived from the
# input used in their production; they are not affected by this license.
# 

all: Makefile.vhdlparser Makefile
	$(MAKE) -f Makefile.vhdlparser    $@

Makefile.vhdlparser: vhdlparser.pro 
	$(ENV) $(PERL) "$(TMAKE)" vhdlparser.pro >Makefile.vhdlparser

tmake: 
	$(ENV) $(PERL) "$(TMAKE)" vhdlparser.pro >Makefile.vhdlparser

clean: Makefile.vhdlparser 
	$(MAKE) -f Makefile.vhdlparser    clean 

regenerate:
	$(RM) CharStream.cc CharStream.h ErrorHandler.h ParseException.cc ParseException.h \
	      Token.cc Token.h TokenManager.h TokenMgrError.cc TokenMgrError.h VhdlParser.cc VhdlParser.h \
	      VhdlParserConstants.h VhdlParserTokenManager.cc VhdlParserTokenManager.h \
              JavaCC.h
	javacc vhdlparser.jj
	$(CP) JavaCC.h.in JavaCC.h

distclean: clean
	$(RM) Makefile vhdlparser.pro

FORCE:
