To use the CAF Test site for the Central Discovery Service, please add the following lines to the shibboleth2.xml file:

1. Inside <Sessions></Sessions> 

	    <SSO discoveryProtocol="SAMLDS" ECP="true" discoveryURL="https://ds.caftest.canarie.ca/DS/CAF.ds">
              SAML2 SAML1
            </SSO>
            <SessionInitiator type="Chaining" Location="/login/shibboleth" isDefault="true" id="Login">
                <SessionInitiator type="SAML2" template="bindingTemplate.html"/>
                <SessionInitiator type="Shib1"/>
                <SessionInitiator type="SAMLDS" URL="https://ds.caftest.canarie.ca/DS/CAF.ds"/>
            </SessionInitiator>

2. Outside <Sessions></Sessions> 
	<MetadataProvider type="XML" uri="http://caf-shib2ops.ca/CoreServices/testbed/caf_test_fed_unsigned.xml"
              backingFilePath="federation-metadata.xml" reloadInterval="300">
        </MetadataProvider>

To use the CAF Production site for the Central Discovery Service, please add the following lines to the shibboleth2.xml file:

1. Inside <Sessions></Sessions>

            <SSO discoveryProtocol="SAMLDS" ECP="true" discoveryURL="https://caf-shib2ops.ca/DS/CAF.ds">
              SAML2 SAML1
            </SSO>
            <SessionInitiator type="Chaining" Location="/login/shibboleth" isDefault="true" id="Login">
                <SessionInitiator type="SAML2" template="bindingTemplate.html"/>
                <SessionInitiator type="Shib1"/>
                <SessionInitiator type="SAMLDS" URL="https://caf-shib2ops.ca/DS/CAF.ds"/>
            </SessionInitiator>

2. Outside <Sessions></Sessions> 
	<MetadataProvider type="XML" uri="http://caf-shib2ops.ca/CoreServices/caf_metadata_signed_sha256.xml" backingFilePath="CAF-metadata.xml" reloadInterval="3600">
            <MetadataFilter type="Signature" certificate="caf_metadata_verify.crt"/>
	</MetadataProvider> 

