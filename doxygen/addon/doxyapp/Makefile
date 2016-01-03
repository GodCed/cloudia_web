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

all clean depend distclean: Makefile.doxyapp 
	$(MAKE) -f Makefile.doxyapp $@

distclean: clean
	$(RM) -rf Makefile doxyapp.pro Makefile.doxyapp

realclean: distclean

tmake:
	$(ENV) $(PERL) "$(TMAKE)" doxyapp.pro >Makefile.doxyapp

strip:
	strip doxyapp

Makefile.doxyapp: doxyapp.pro
	$(ENV) $(PERL) "$(TMAKE)" doxyapp.pro >Makefile.doxyapp

install:
