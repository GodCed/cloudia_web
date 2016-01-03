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

all clean depend: Makefile.doxysearch Makefile.doxyindexer
	$(MAKE) -f Makefile.doxysearch $@
	$(MAKE) -f Makefile.doxyindexer $@

distclean: clean
	$(RM) -rf Makefile doxysearch.pro Makefile.doxysearch
	$(RM) -rf Makefile doxyindexer.pro Makefile.doxyindexer

tmake:
	$(ENV) $(PERL) "$(TMAKE)" doxysearch.pro >Makefile.doxysearch
	$(ENV) $(PERL) "$(TMAKE)" doxyindexer.pro >Makefile.doxyindexer

strip:
	strip doxysearch

Makefile.doxysearch: doxysearch.pro
	$(ENV) $(PERL) "$(TMAKE)" doxysearch.pro >Makefile.doxysearch

Makefile.doxyindexer: doxyindexer.pro
	$(ENV) $(PERL) "$(TMAKE)" doxyindexer.pro >Makefile.doxyindexer

install:
	$(INSTTOOL) -d $(INSTALL)/bin	
	$(INSTTOOL) -m 755 ../../bin/doxysearch.cgi $(INSTALL)/bin	
	$(INSTTOOL) -m 755 ../../bin/doxyindexer $(INSTALL)/bin	
	$(INSTTOOL) -d $(INSTALL)/$(MAN1DIR)
	cat ../../doc/doxyindexer.1 | sed -e "s/DATE/$(DATE)/g" -e "s/VERSION/$(VERSION)/g" > doxyindexer.1
	$(INSTTOOL) -m 644 doxyindexer.1 $(INSTALL)/$(MAN1DIR)/doxyindexer.1
	rm doxyindexer.1
	cat ../../doc/doxysearch.1 | sed -e "s/DATE/$(DATE)/g" -e "s/VERSION/$(VERSION)/g" > doxysearch.1
	$(INSTTOOL) -m 644 doxysearch.1 $(INSTALL)/$(MAN1DIR)/doxysearch.1
	rm doxysearch.1

