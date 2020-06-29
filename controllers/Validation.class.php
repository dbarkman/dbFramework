<?php

/**
 * Validation.class.php
 * Description:
 */

class Validation
{
    private $_dd = null;

    public function __construct()
	{
        $this->_dd = new Dropdowns();
    }

	protected function checkBlank($input)
	{
		if (!strlen($input)) {
			return 'blank';
		}
	}

	protected function checkLength($input, $expectedLength)
	{
		if (strlen($input) < $expectedLength) {
			return 'short';
		}
	}

	protected function prepare($input)
	{
		return htmlentities($input, ENT_QUOTES);
	}

	//stanitizing methods
	protected function sanitizeInteger($input)
	{
		$pattern = "/[0-9]/";
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeIntegers($input)
	{
		$pattern = "/[0-9,]/";
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeFloat($input)
	{
		$pattern = '/[0-9.]/';
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeNumbers($input)
	{
		$pattern = '/[0-9]/';
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeAlphanums($input)
	{
		$pattern = '/[A-Za-z0-9]/';
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeAlphanumsWithSpace($input)
	{
		$pattern = '/[A-Za-z0-9 ]/';
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeAlphanumsWithSpaceAndPunctuation($input)
	{
		$pattern = "/[ A-Za-z0-9.',-]/";
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeText($input)
	{
		$pattern = "/[A-Za-z]/";
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeTextWithSpace($input)
	{
		$pattern = "/[A-Za-z ]/";
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function santizieTextWithSpaceAndPunctuation($input)
	{
		$pattern = "/[ A-Za-z.',-]/";
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeName($input)
	{
		$pattern = "/[ A-Za-z.',-]/";
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeMachineName($input)
	{
		$pattern = "/[ A-Za-z0-9.,-_]/";
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizePhone($input)
	{
		$pattern = '/[ 0-9()-]/';
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeStreetAddress($input)
	{
		$pattern = "/[ A-Za-z0-9.',-]/";
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeZip($input)
	{
		$pattern = '/[ 0-9-]/';
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeSentence($input)
	{
		$pattern = "/[ A-Za-z0-9.?!',-_()]/";
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeUUID($input)
	{
		$pattern = '/[A-Za-z0-9-]/';
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeMoney($input)
	{
		$pattern = '/[0-9.]/';
		return implode("", preg_grep($pattern, str_split($input)));
	}

	protected function sanitizeEmail($input)
	{
		$pattern = "/[A-Za-z0-9.@-_]/";
		return implode("", preg_grep($pattern, str_split($input)));
	}

    protected function checkAPIKey($apiKey)
    {
        if (!in_array($apiKey, $this->_dd->apiKeys)) {
            return 'nonAPIKey';
        }
    }

    protected function checkParameters($parameter)
    {
        if (!in_array($parameter, $this->_dd->getParameters)) {
            return 'nonParameter';
        }
    }

    protected function checkResponseType($responseType)
	{
		if (!in_array($responseType, $this->_dd->responseType)) {
			return 'nonResponseType';
		}
	}

	protected function checkTrailingComma($input)
	{
		$pattern = "/,$/";
		if (preg_match($pattern, $input)) {
			return 'trailingComma';
		}
	}

    protected function checkDate($date)
    {
        if(!strtotime($date))
        {
            return 'nonDate';
        }

    }

	protected function checkInteger($input)
	{
		$pattern = "/[^0-9]/";
		if (preg_match($pattern, $input)) {
			return 'nonAPIInteger';
		}
	}

	protected function checkIntegers($input)
	{
		$pattern = "/[^0-9,]/";
		if (preg_match($pattern, $input)) {
			return 'nonAPIInteger';
		}
	}

	protected function checkIntegerNoPattern($input)
	{
		if ($input != strval(intval($input))) {
			return 'nonInteger';
		}
	}

	protected function checkFloat($input)
	{
		if ($input != strval(floatval($input))) {
			return 'nonFloat';
		}
	}

	protected function checkNumber($input)
	{
		$pattern = '/[^0-9]/';
		if (preg_match($pattern, $input)) {
			return 'nonNumber';
		}
	}

	protected function checkNumeric($input)
	{
		if (!ctype_digit($input)) {
			return 'nonNumber';
		}
	}

	protected function checkAlphanums($input)
	{
		$pattern = '/[^A-Za-z0-9]/';
		if (preg_match($pattern, $input)) {
			return 'nonAlphanum';
		}
	}

    protected function checkAlphanumsWithSpace($input)
    {
        $pattern = '/[^A-Za-z0-9 ]/';
        if (preg_match($pattern, $input)) {
            return 'nonAlphanum';
        }
    }

    protected function checkAlphanumsWithSpaceDotDash($input)
    {
        $pattern = '/[^A-Za-z0-9 .%-]/';
        if (preg_match($pattern, $input)) {
            return 'nonAlphanum';
        }
    }

    protected function checkAlphanumsWithSpaceAndPunctuation($input)
	{
		$pattern = "/[^A-Za-z0-9.',- ]/";
		if (preg_match($pattern, $input)) {
			return 'nonAlphanum';
		}
	}

	protected function checkText($input)
	{
		$pattern = '/[^A-Za-z]/';
		if (preg_match($pattern, $input)) {
			return 'nonText';
		}
	}

	protected function checkTextWithSpace($input)
	{
		$pattern = '/[^A-Za-z ]/';
		if (preg_match($pattern, $input)) {
			return 'nonText';
		}
	}

	protected function checkTextWithSpaceAndPunctuation($input)
	{
		$pattern = "/[^A-Za-z.',- ]/";
		if (preg_match($pattern, $input)) {
			return 'nonText';
		}
	}

	protected function checkVersionNumber($input)
	{
		$pattern = '/[^0-9.]/';
		if (preg_match($pattern, $input)) {
			return 'nonNumber';
		}
	}

	protected function checkUUID($input)
	{
		$pattern = '/[^A-Za-z0-9-]/';
		if (preg_match($pattern, $input)) {
			return 'nonUUID';
		}
	}

	protected function checkNames($input)
	{
		$pattern = "/[^ A-Za-z.',-]/";
		if (preg_match($pattern, $input)) {
			return 'nonName';
		}
	}

	protected function checkName($input)
	{
		$pattern = "/[^ A-Za-z.'-]/";
		if (preg_match($pattern, $input)) {
			return 'nonName';
		}
	}

	protected function checkMachineName($input)
	{
		$pattern = "/[^ A-Za-z0-9.,-_]/";
		if (preg_match($pattern, $input)) {
			return 'nonMachineName';
		}
	}

	protected function checkPhone($input)
	{
		$pattern = '/[^ 0-9()-]/';
		if (preg_match($pattern, $input)) {
			return 'nonNumber';
		}
	}

	protected function checkAddress($input)
	{
		$pattern = "/[^ A-Za-z0-9.',-]/";
		if (preg_match($pattern, $input)) {
			return 'nonAddress';
		}
	}

	protected function checkZip($input)
	{
		$pattern = '/[^ 0-9-]/';
		if (preg_match($pattern, $input)) {
			return 'nonNumber';
		}
	}

	protected function checkSentence($input)
	{
		$pattern = "/[^ A-Za-z0-9.?!',-_()]/";
		if (preg_match($pattern, $input)) {
			return 'nonSentance';
		}
	}

	protected function checkMoney($input)
	{
		$pattern = '/[^0-9.]/';
		if (preg_match($pattern, $input)) {
			return 'nonMoney';
		}
	}

	protected function checkMoneyExtended($input)
	{
		$pattern = '/[^$%=0-9.,A-Za-zÂâ¢£¥₣₤₧€ ]/';
		if (preg_match($pattern, $input)) {
			return 'nonMoney';
		}
	}

	protected function checkTrueFalse($input)
	{
		$pattern = '/[^TRUEFALSEtruefalse]/';
		if (preg_match($pattern, $input)) {
			return 'nonMoney';
		}
	}

	protected function checkIllegal($input)
	{
//        $pattern = '/[!#$%^*()=+~_`\[\]{}|;:"<>?\/-]/';
        $pattern = '/[!#$^*()=+~_`\[\]{}|;:"<>?\/]/';
		//not working(~, _, `)
		if (preg_match($pattern, $input)) {
			return 'nonLegal';
		}
	}

	protected function checkTextField($input)
	{
		$pattern = '/[=\[\]{}|<>]/';
		//not working(~, _, `)
		if (preg_match($pattern, $input)) {
			return 'nonLegal';
		}
	}

	protected function checkSQLInjectDashDash($input)
	{
		$pattern = '/[-][-]/';
		if (preg_match($pattern, $input)) {
			return 'nonLegal';
		}
	}

	protected function checkSQLInjectSemiColon($input)
	{
		$pattern = '/[;]/';
		if (preg_match($pattern, $input)) {
			return 'nonLegal';
		}
	}

	protected function checkSQLInjectEqual($input)
	{
		$pattern = '/[=]/';
		if (preg_match($pattern, $input)) {
			return 'nonLegal';
		}
	}

	protected function checkSQLInjectDrop($input)
	{
		$pattern = '/[Dd][Rr][Oo][Pp][ ]/';
		if (preg_match($pattern, $input)) {
			return 'nonLegal';
		}
	}

	protected function checkSQLInjectInsert($input)
	{
		$pattern = '/[Ii][Nn][Ss][Ee][Rr][Tt][ ]/';
		if (preg_match($pattern, $input)) {
			return 'nonLegal';
		}
	}

	protected function checkSQLInjectUpdate($input)
	{
		$pattern = '/[Uu][Pp][Dd][Aa][Tt][Ee][ ]/';
		if (preg_match($pattern, $input)) {
			return 'nonLegal';
		}
	}

	protected function checkSQLInjectSelect($input)
	{
		$pattern = '/[Ss][Ee][Ll][Ee][Cc][Tt][ ]/';
		if (preg_match($pattern, $input)) {
			return 'nonLegal';
		}
	}

	protected function checkSQLInjectDelete($input)
	{
		$pattern = '/[Dd][Ee][Ll][Ee][Tt][Ee][ ]/';
		if (preg_match($pattern, $input)) {
			return 'nonLegal';
		}
	}

	protected function checkCreditcard($s)
	{
		$s = strrev(preg_replace('/[^\d]/', '', $s));
		$sum = 0;
		for ($i = 0, $j = strlen($s); $i < $j; $i++) {
			if (($i % 2) == 0) {
				$val = $s[$i];
			} else {
				$val = $s[$i] * 2;
				if ($val > 9) {
					$val -= 9;
				}
			}
			$sum += $val;
		}
		//        return (($sum % 10) == 0);
		if (!($sum % 10) == 0) {
			return 'nonCreditcard';
		}
	}

	protected function checkMonth($month)
	{
		if (!array_key_exists($month, $this->_dd->months)) {
			return 'nonMonth';
		}
	}

	protected function checkYear($year)
	{
		if (!array_key_exists($year, $this->_dd->getYears())) {
			return 'nonYear';
		}
	}

	protected function checkState($state)
	{
		if (!array_key_exists($state, $this->_dd->statesUS)) {
			return 'nonState';
		}
	}

	protected function checkCountry($country)
	{
		if (!array_key_exists($country, $this->_dd->countries)) {
			return 'nonCountry';
		}
	}

	protected function checkEmail($input)
	{
		$response = $this->is_rfc3696_valid_email_address($input);
		if ($response == 0) {
			return 'nonEmail';
		}
	}

	#
	# RFC3696 Email Parser
	#
	# By Cal Henderson <cal@iamcal.com>
	#
	# This code is dual licensed:
	# CC Attribution-ShareAlike 2.5 - http://creativecommons.org/licenses/by-sa/2.5/
	# GPLv3 - http://www.gnu.org/copyleft/gpl.html
	#
	# $Revision: #3 $
	#
	##################################################################################

	private function is_rfc3696_valid_email_address($email)
	{
		####################################################################################
		#
		# NO-WS-CTL       =       %d1-8 /         ; US-ASCII control characters
		#                         %d11 /          ;  that do not include the
		#                         %d12 /          ;  carriage return, line feed,
		#                         %d14-31 /       ;  and white space characters
		#                         %d127
		# ALPHA          =  %x41-5A / %x61-7A   ; A-Z / a-z
		# DIGIT          =  %x30-39

		$no_ws_ctl = "[\\x01-\\x08\\x0b\\x0c\\x0e-\\x1f\\x7f]";
		$alpha = "[\\x41-\\x5a\\x61-\\x7a]";
		$digit = "[\\x30-\\x39]";
		$cr = "\\x0d";
		$lf = "\\x0a";
		$crlf = "(?:$cr$lf)";

		####################################################################################
		#
		# obs-char        =       %d0-9 / %d11 /          ; %d0-127 except CR and
		#                         %d12 / %d14-127         ;  LF
		# obs-text        =       *LF *CR *(obs-char *LF *CR)
		# text            =       %d1-9 /         ; Characters excluding CR and LF
		#                         %d11 /
		#                         %d12 /
		#                         %d14-127 /
		#                         obs-text
		# obs-qp          =       "\" (%d0-127)
		# quoted-pair     =       ("\" text) / obs-qp

		$obs_char = "[\\x00-\\x09\\x0b\\x0c\\x0e-\\x7f]";
		$obs_text = "(?:$lf*$cr*(?:$obs_char$lf*$cr*)*)";
		$text = "(?:[\\x01-\\x09\\x0b\\x0c\\x0e-\\x7f]|$obs_text)";

		#
		# there's an issue with the definition of 'text', since 'obs_text' can
		# be blank and that allows qp's with no character after the slash. we're
		# treating that as bad, so this just checks we have at least one
		# (non-CRLF) character
		#

		$text = "(?:$lf*$cr*$obs_char$lf*$cr*)";
		$obs_qp = "(?:\\x5c[\\x00-\\x7f])";
		$quoted_pair = "(?:\\x5c$text|$obs_qp)";

		####################################################################################
		#
		# obs-FWS         =       1*WSP *(CRLF 1*WSP)
		# FWS             =       ([*WSP CRLF] 1*WSP) /   ; Folding white space
		#                         obs-FWS
		# ctext           =       NO-WS-CTL /     ; Non white space controls
		#                         %d33-39 /       ; The rest of the US-ASCII
		#                         %d42-91 /       ;  characters not including "(",
		#                         %d93-126        ;  ")", or "\"
		# ccontent        =       ctext / quoted-pair / comment
		# comment         =       "(" *([FWS] ccontent) [FWS] ")"
		# CFWS            =       *([FWS] comment) (([FWS] comment) / FWS)

		#
		# note: we translate ccontent only partially to avoid an infinite loop
		# instead, we'll recursively strip *nested* comments before processing
		# the input. that will leave 'plain old comments' to be matched during
		# the main parse.
		#

		$wsp = "[\\x20\\x09]";
		$obs_fws = "(?:$wsp+(?:$crlf$wsp+)*)";
		$fws = "(?:(?:(?:$wsp*$crlf)?$wsp+)|$obs_fws)";
		$ctext = "(?:$no_ws_ctl|[\\x21-\\x27\\x2A-\\x5b\\x5d-\\x7e])";
		$ccontent = "(?:$ctext|$quoted_pair)";
		$comment = "(?:\\x28(?:$fws?$ccontent)*$fws?\\x29)";
		$cfws = "(?:(?:$fws?$comment)*(?:$fws?$comment|$fws))";

		#
		# these are the rules for removing *nested* comments. we'll just detect
		# outer comment and replace it with an empty comment, and recurse until
		# we stop.
		#

		$outer_ccontent_dull = "(?:$fws?$ctext|$quoted_pair)";
		$outer_ccontent_nest = "(?:$fws?$comment)";
		$outer_comment = "(?:\\x28$outer_ccontent_dull*(?:$outer_ccontent_nest$outer_ccontent_dull*)+$fws?\\x29)";

		####################################################################################
		#
		# atext           =       ALPHA / DIGIT / ; Any character except controls,
		#                         "!" / "#" /     ;  SP, and specials.
		#                         "$" / "%" /     ;  Used for atoms
		#                         "&" / "'" /
		#                         "*" / "+" /
		#                         "-" / "/" /
		#                         "=" / "?" /
		#                         "^" / "_" /
		#                         "`" / "{" /
		#                         "|" / "}" /
		#                         "~"
		# atom            =       [CFWS] 1*atext [CFWS]

		$atext = "(?:$alpha|$digit|[\\x21\\x23-\\x27\\x2a\\x2b\\x2d\\x2f\\x3d\\x3f\\x5e\\x5f\\x60\\x7b-\\x7e])";
		$atom = "(?:$cfws?(?:$atext)+$cfws?)";

		####################################################################################
		#
		# qtext           =       NO-WS-CTL /     ; Non white space controls
		#                         %d33 /          ; The rest of the US-ASCII
		#                         %d35-91 /       ;  characters not including "\"
		#                         %d93-126        ;  or the quote character
		# qcontent        =       qtext / quoted-pair
		# quoted-string   =       [CFWS]
		#                         DQUOTE *([FWS] qcontent) [FWS] DQUOTE
		#                         [CFWS]
		# word            =       atom / quoted-string

		$qtext = "(?:$no_ws_ctl|[\\x21\\x23-\\x5b\\x5d-\\x7e])";
		$qcontent = "(?:$qtext|$quoted_pair)";
		$quoted_string = "(?:$cfws?\\x22(?:$fws?$qcontent)*$fws?\\x22$cfws?)";

		#
		# changed the '*' to a '+' to require that quoted strings are not empty
		#

		$quoted_string = "(?:$cfws?\\x22(?:$fws?$qcontent)+$fws?\\x22$cfws?)";
		$word = "(?:$atom|$quoted_string)";

		####################################################################################
		#
		# obs-local-part  =       word *("." word)
		# obs-domain      =       atom *("." atom)

		$obs_local_part = "(?:$word(?:\\x2e$word)*)";
		$obs_domain = "(?:$atom(?:\\x2e$atom)*)";

		####################################################################################
		#
		# dot-atom-text   =       1*atext *("." 1*atext)
		# dot-atom        =       [CFWS] dot-atom-text [CFWS]

		$dot_atom_text = "(?:$atext+(?:\\x2e$atext+)*)";
		$dot_atom = "(?:$cfws?$dot_atom_text$cfws?)";

		####################################################################################
		#
		# domain-literal  =       [CFWS] "[" *([FWS] dcontent) [FWS] "]" [CFWS]
		# dcontent        =       dtext / quoted-pair
		# dtext           =       NO-WS-CTL /     ; Non white space controls
		#
		#                         %d33-90 /       ; The rest of the US-ASCII
		#                         %d94-126        ;  characters not including "[",
		#                                         ;  "]", or "\"

		$dtext = "(?:$no_ws_ctl|[\\x21-\\x5a\\x5e-\\x7e])";
		$dcontent = "(?:$dtext|$quoted_pair)";
		$domain_literal = "(?:$cfws?\\x5b(?:$fws?$dcontent)*$fws?\\x5d$cfws?)";

		####################################################################################
		#
		# local-part      =       dot-atom / quoted-string / obs-local-part
		# domain          =       dot-atom / domain-literal / obs-domain
		# addr-spec       =       local-part "@" domain

		$local_part = "(($dot_atom)|($quoted_string)|($obs_local_part))";
		$domain = "(($dot_atom)|($domain_literal)|($obs_domain))";
		$addr_spec = "$local_part\\x40$domain";

		#
		# see http://www.dominicsayers.com/isemail/ for details, but this should probably be 254
		#

		if (strlen($email) > 256) return 0;

		#
		# we need to strip nested comments first - we replace them with a simple comment
		#

		$email = $this->rfc3696_strip_comments($outer_comment, $email, "(x)");

		#
		# now match what's left
		#

		if (!preg_match("!^$addr_spec$!", $email, $m)) {
			return 0;
		}

		$bits = array(
			'local' => isset($m[1]) ? $m[1] : '',
			'local-atom' => isset($m[2]) ? $m[2] : '',
			'local-quoted' => isset($m[3]) ? $m[3] : '',
			'local-obs' => isset($m[4]) ? $m[4] : '',
			'domain' => isset($m[5]) ? $m[5] : '',
			'domain-atom' => isset($m[6]) ? $m[6] : '',
			'domain-literal' => isset($m[7]) ? $m[7] : '',
			'domain-obs' => isset($m[8]) ? $m[8] : '',
		);

		#
		# we need to now strip comments from $bits[local] and $bits[domain],
		# since we know they're i the right place and we want them out of the
		# way for checking IPs, label sizes, etc
		#

		$bits['local'] = $this->rfc3696_strip_comments($comment, $bits['local']);
		$bits['domain'] = $this->rfc3696_strip_comments($comment, $bits['domain']);

		#
		# length limits on segments
		#

		if (strlen($bits['local']) > 64) return 0;
		if (strlen($bits['domain']) > 255) return 0;

		#
		# restrictuions on domain-literals from RFC2821 section 4.1.3
		#

		if (strlen($bits['domain-literal'])) {

			$Snum = "(\d{1,3})";
			$IPv4_address_literal = "$Snum\.$Snum\.$Snum\.$Snum";

			$IPv6_hex = "(?:[0-9a-fA-F]{1,4})";

			$IPv6_full = "IPv6\:$IPv6_hex(:?\:$IPv6_hex){7}";

			$IPv6_comp_part = "(?:$IPv6_hex(?:\:$IPv6_hex){0,5})?";
			$IPv6_comp = "IPv6\:($IPv6_comp_part\:\:$IPv6_comp_part)";

			$IPv6v4_full = "IPv6\:$IPv6_hex(?:\:$IPv6_hex){5}\:$IPv4_address_literal";

			$IPv6v4_comp_part = "$IPv6_hex(?:\:$IPv6_hex){0,3}";
			$IPv6v4_comp = "IPv6\:((?:$IPv6v4_comp_part)?\:\:(?:$IPv6v4_comp_part\:)?)$IPv4_address_literal";


			#
			# IPv4 is simple
			#

			if (preg_match("!^\[$IPv4_address_literal\]$!", $bits['domain'], $m)) {
				if (intval($m[1]) > 255) return 0;
				if (intval($m[2]) > 255) return 0;
				if (intval($m[3]) > 255) return 0;
				if (intval($m[4]) > 255) return 0;

			} else {
				#
				# this should be IPv6 - a bunch of tests are needed here :)
				#

				while (1) {
					if (preg_match("!^\[$IPv6_full\]$!", $bits['domain'])) {
						break;
					}

					if (preg_match("!^\[$IPv6_comp\]$!", $bits['domain'], $m)) {
						list($a, $b) = explode('::', $m[1]);
						$folded = (strlen($a) && strlen($b)) ? "$a:$b" : "$a$b";
						$groups = explode(':', $folded);
						if (count($groups) > 6) return 0;
						break;
					}

					if (preg_match("!^\[$IPv6v4_full\]$!", $bits['domain'], $m)) {

						if (intval($m[1]) > 255) return 0;
						if (intval($m[2]) > 255) return 0;
						if (intval($m[3]) > 255) return 0;
						if (intval($m[4]) > 255) return 0;
						break;
					}

					if (preg_match("!^\[$IPv6v4_comp\]$!", $bits['domain'], $m)) {
						list($a, $b) = explode('::', $m[1]);
						$b = substr($b, 0, -1); # remove the trailing colon before the IPv4 address
						$folded = (strlen($a) && strlen($b)) ? "$a:$b" : "$a$b";
						$groups = explode(':', $folded);
						if (count($groups) > 4) return 0;
						break;
					}
					return 0;
				}
			}
		} else {
			#
			# the domain is either dot-atom or obs-domain - either way, it's
			# made up of simple labels and we split on dots
			#

			$labels = explode('.', $bits['domain']);

			#
			# this is allowed by both dot-atom and obs-domain, but is un-routeable on the
			# public internet, so we'll fail it (e.g. user@localhost)
			#

			if (count($labels) == 1) return 0;

			#
			# checks on each label
			#

			foreach ($labels as $label) {

				if (strlen($label) > 63) return 0;
				if (substr($label, 0, 1) == '-') return 0;
				if (substr($label, -1) == '-') return 0;
			}

			#
			# last label can't be all numeric
			#

			if (preg_match('!^[0-9]+$!', array_pop($labels))) return 0;
		}
		return 1;
	}

	##################################################################################
	private function rfc3696_strip_comments($comment, $email, $replace = '')
	{
		while (1) {
			$new = preg_replace("!$comment!", $replace, $email);
			if (strlen($new) == strlen($email)) {
				return $email;
			}
			$email = $new;
		}
	}
	##################################################################################
}