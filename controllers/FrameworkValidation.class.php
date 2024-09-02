<?php

/**
 * FrameworkValidation.class.php
 * Description:
 *
 */

class FrameworkValidation extends Validation
{

	public function __construct()
	{
        parent::__construct();
	}

	public function sanitizeAPIKey($input)
	{
		return parent::sanitizeAlphanums($input);
	}

	public function sanitizeUUID($input)
	{
		return parent::sanitizeUUID($input);
	}

	public function sanitizeInteger($input)
	{
		return parent::sanitizeInteger($input);
	}

	public function sanitizeFloat($input)
	{
		return parent::sanitizeFloat($input);
	}

	public function sanitizeNumbers($input)
	{
		return parent::sanitizeNumbers($input);
	}

	public function sanitizeAlphanums($input)
	{
		return parent::sanitizeAlphanums($input);
	}

	public function sanitizeAlphanumsWithSpace($input)
	{
		return parent::sanitizeAlphanumsWithSpace($input);
	}

	public function sanitizeAlphanumsWithSpaceAndPunctuation($input)
	{
		return parent::sanitizeAlphanumsWithSpaceAndPunctuation($input);
	}

	public function sanitizeText($input)
	{
		return parent::sanitizeText($input);
	}

	public function sanitizeTextWithSpace($input)
	{
		return parent::sanitizeTextWithSpace($input);
	}

	public function santizieTextWithSpaceAndPunctuation($input)
	{
		return parent::santizieTextWithSpaceAndPunctuation($input);
	}

	public function sanitizeName($input)
	{
		return parent::sanitizeName($input);
	}

	public function sanitizeMachineName($input)
	{
		return parent::sanitizeMachineName($input);
	}

	public function sanitizeSentence($input)
	{
		return parent::sanitizeSentence($input);
	}

	public function sanitizeEmail($input)
	{
		return parent::sanitizeEmail($input);
	}

	public function sanitizeCategory($input)
	{
		return parent::sanitizeTextWithSpace($input);
	}

    public function validateAPIKey($input, $length = 64)
    {
        $error = '';

        if (parent::checkBlank($input) != null) {
            $error = 'Blank';
        } else {
            if (parent::checkLength($input, $length) != null) {
                $error = 'Short';
            } else {
                if (parent::checkIllegal($input) != null) {
                    $error = 'Illegal';
                } else {
                    if (parent::checkAPIKey($input) != null) {
                        $error = 'Invalid';
                    }
                }
            }
        }
        return $error;
    }

    public function validateParameterKeys($input)
    {
        $error = '';

        if (parent::checkIllegal($input) != null) {
            $error = 'Illegal';
        } else {
            if (parent::checkAlphanums($input) != null) {
                $error = 'Invalid';
            } else {
                if (parent::checkParameters($input) != null) {
                    $error = 'Invalid';
                }
            }
        }
        return $error;
    }

    public function validateParameterValues($input)
    {
        $error = '';

        if (parent::checkBlank($input) != null) {
            $error = 'Blank';
        } else {
            if (parent::checkIllegal($input) != null) {
                $error = 'Illegal';
            } else {
                if (parent::checkAlphanumsWithSpaceDotDash($input) != null) {
                    $error = 'Invalid';
                }
            }
        }
        return $error;
    }

	public function validateName($input)
	{
		$error = '';

		if (parent::checkBlank($input) != null) {
			$error = 'Blank';
		} else {
			if (parent::checkLength($input, 1) != null) {
				$error = 'Short';
			} else {
				if (parent::checkIllegal($input) != null) {
					$error = 'Illegal';
				} else {
					if (parent::checkName($input) != null) {
						$error = 'Invalid';
					}
				}
			}
		}
		return $error;
	}

	public function validateAlphanums($input)
	{
		$error = '';

		if (parent::checkBlank($input) != null) {
			$error = 'Blank';
		} else {
			if (parent::checkLength($input, 1) != null) {
				$error = 'Short';
			} else {
				if (parent::checkIllegal($input) != null) {
					$error = 'Illegal';
				} else {
					if (parent::checkAlphanums($input) != null) {
						$error = 'Invalid';
					}
				}
			}
		}
		return $error;
	}

	public function validateAlphanumsWithSpace($input)
	{
		$error = '';

		if (parent::checkBlank($input) != null) {
			$error = 'Blank';
		} else {
			if (parent::checkLength($input, 1) != null) {
				$error = 'Short';
			} else {
				if (parent::checkIllegal($input) != null) {
					$error = 'Illegal';
				} else {
					if (parent::checkAlphanumsWithSpace($input) != null) {
						$error = 'Invalid';
					}
				}
			}
		}
		return $error;
	}

	public function validateAlphanumsWithSpaceAndPunctuation($input)
	{
		$error = '';

		if (parent::checkBlank($input) != null) {
			$error = 'Blank';
		} else {
			if (parent::checkLength($input, 1) != null) {
				$error = 'Short';
			} else {
				if (parent::checkIllegal($input) != null) {
					$error = 'Illegal';
				} else {
					if (parent::checkAlphanumsWithSpaceAndPunctuation($input) != null) {
						$error = 'Invalid';
					}
				}
			}
		}
		return $error;
	}

	public function validateText($input)
	{
		$error = '';

		if (parent::checkBlank($input) != null) {
			$error = 'Blank';
		} else {
			if (parent::checkLength($input, 1) != null) {
				$error = 'Short';
			} else {
				if (parent::checkIllegal($input) != null) {
					$error = 'Illegal';
				} else {
					if (parent::checkText($input) != null) {
						$error = 'Invalid';
					}
				}
			}
		}
		return $error;
	}

	public function validateTextWithSpace($input)
	{
		$error = '';

		if (parent::checkBlank($input) != null) {
			$error = 'Blank';
		} else {
			if (parent::checkLength($input, 1) != null) {
				$error = 'Short';
			} else {
				if (parent::checkIllegal($input) != null) {
					$error = 'Illegal';
				} else {
					if (parent::checkTextWithSpace($input) != null) {
						$error = 'Invalid';
					}
				}
			}
		}
		return $error;
	}

	public function validateTextWithSpaceAndPunctuation($input)
	{
		$error = '';

		if (parent::checkBlank($input) != null) {
			$error = 'Blank';
		} else {
			if (parent::checkLength($input, 1) != null) {
				$error = 'Short';
			} else {
				if (parent::checkIllegal($input) != null) {
					$error = 'Illegal';
				} else {
					if (parent::checkTextWithSpaceAndPunctuation($input) != null) {
						$error = 'Invalid';
					}
				}
			}
		}
		return $error;
	}

	public function validateInteger($input)
	{
		$error = '';

		if (parent::checkBlank($input) != null) {
			$error = 'Blank';
		} else {
			if (parent::checkLength($input, 1) != null) {
				$error = 'Short';
			} else {
				if (parent::checkIllegal($input) != null) {
					$error = 'Illegal';
				} else {
					if (parent::checkInteger($input) != null) {
						$error = 'Invalid';
					}
				}
			}
		}
		return $error;
	}

	public function validateFloat($input)
	{
		$error = '';

		if (parent::checkBlank($input) != null) {
			$error = 'Blank';
		} else {
			if (parent::checkLength($input, 1) != null) {
				$error = 'Short';
			} else {
				if (parent::checkIllegal($input) != null) {
					$error = 'Illegal';
				} else {
					if (parent::checkFloat($input) != null) {
						$error = 'Invalid';
					}
				}
			}
		}
		return $error;
	}

	public function validateVersionNumber($input)
	{
		$error = '';

		if (parent::checkBlank($input) != null) {
			$error = 'Blank';
		} else {
			if (parent::checkLength($input, 1) != null) {
				$error = 'Short';
			} else {
				if (parent::checkIllegal($input) != null) {
					$error = 'Illegal';
				} else {
					if (parent::checkVersionNumber($input) != null) {
						$error = 'Invalid';
					}
				}
			}
		}
		return $error;
	}

	public function validateUUID($input)
	{
		$error = '';

		if (parent::checkBlank($input) != null) {
			$error = 'Blank';
		} else {
			if (parent::checkLength($input, 36) != null) {
				$error = 'Short';
			} else {
				if (parent::checkUUID($input) != null) {
					$error = 'Invalid';
				}
			}
		}
		return $error;
	}

	public function validateMachineName($input)
	{
		$error = '';

		if (parent::checkBlank($input) != null) {
			$error = 'Blank';
		} else {
			if (parent::checkLength($input, 1) != null) {
				$error = 'Short';
			} else {
				if (parent::checkMachineName($input) != null) {
					$error = 'Invalid';
				}
			}
		}
		return $error;
	}

	public function validateSentence($input)
	{
		$error = '';

		if (parent::checkBlank($input) != null) {
			$error = 'Blank';
		} else {
			if (parent::checkLength($input, 1) != null) {
				$error = 'Short';
			} else {
				if (parent::checkSentence($input) != null) {
					$error = 'Invalid';
				}
			}
		}
		return $error;
	}

	public function validateEmail($input)
	{
		$error = '';

		if (parent::checkBlank($input) != null) {
			$error = 'Blank';
		} else {
			if (parent::checkLength($input, 6) != null) {
				$error = 'Short';
			} else {
				if (parent::checkEmail($input) != null) {
					$error = 'Invalid';
				}
			}
		}
		return $error;
	}
}
